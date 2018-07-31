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

Route::get('/', function () {
	echo "TEST";exit;
    return view('welcome');
});

Route::get('/test_URI_2', function () {
	echo "TEST URI 2";exit;
    return view('welcome');
});
