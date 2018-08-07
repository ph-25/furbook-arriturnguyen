<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Them moi va chinh sua cac URI hop le o file nay.

// Home page
Route::get('/', function () {
    return redirect('/cats');
});

// Cats list
Route::get('/cats', function () {
	// Get all cats, :: la phuong thuc tinh
	$cats = Furbook\Cat::all(); // Thay vi khai bao namespace tren dau file (use Furbook\Cat;) ta dung Furbook\Cat::all(); o day
	// dd($cats);
	// Ba cach truyen DL xuong views: Cach 1: PHP thuan
    return view('cats/index', array('cats' => $cats)); // Truyen 1 bien xuong view bang cach dung mang
    // Cach 2: Dung ham compact cua PHP thuan
    //  return view('cats/index', compact('cats')); // Tham so cats truyen vao duoi dang mang
    // Cach 3: Dung ham with cua Laravel
    // return view('cats/index')->with('cats', $cats);
});

// Display all cat of one breed
Route::get('cats/breeds/{name}', function($name) {
	$breed = Furbook\Breed::with('cats') // Co the khai bao namespace o dau file de k can dung Furbook\... nua
	->whereName($name)
	->first();
	return view('cats.index')
	->with('breed', $breed)
	->with('cats', $breed->cats);
});

// Detail ID of that cat
Route::get('/cats/{id}', function($id) {
	$cat = Furbook\Cat::find($id);
	return view('cats.show')
		->with('cat', $cat);
})->where('id', '[0-9]+');

// Show create new cat page
Route::get('/cats/create', function() {
	return view('cats.create');
});

// Insert new cat
Route::post('/cats', function() {
	$data = Request::all();
	$cat = Furbook\Cat::create($data);
	return redirect('/cats/'.$cat->id)
		->withSuccess('Create cat successfully');
	//dd(Request::all());
});

// Edit cat page
Route::get('/cats/{id}/edit', function($id) {
	$cat = Furbook\Cat::find($id);
	return view('cats.edit')
		->with('cat', $cat);
});

// Update a cat
Route::put('/cats/{id}', function($id) {
	$data = Request::all();
	$cat = Furbook\Cat::find($id);
	$cat->update($data);
	return redirect('/cats/'.$cat->id)
		->withSuccess('Update cat successfully');
	//dd(Request::all());
});


