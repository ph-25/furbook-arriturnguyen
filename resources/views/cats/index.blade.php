	<!-- htmlentities: Tim cac lenh html hoac javascript de hien thi o dang text chu k execute -->
	<!-- echo htmlentities($cats); Boc the PHP-->

	<!-- Tuong duong voi cum code thuan o tren, k can boc the PHP -->
	<!-- {{$cats}}  -->

	<!-- Tra ve du lieu tho -->
	<!-- {{!! $cats !!}} 	 -->
@extends('layouts.master')

@section('header')
	@if (isset($breed))
	<a href="{{ url('/') }}">Back to the overview</a>
	@endif
	<h2>
	All @if (isset($breed)){{ $breed->name }}@endif Cats
	<a href="{{ url('cats/create') }}" class="btn btn-primary pull-right">
	Add a new cat
	</a>
	</h2>
@stop

@section('content')

<table class="table table-border">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Birthday</th>
					<th>Breed name</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cats as $cat)
				<tr>
					<td>{{$cat->id}}</td>
					<td>{{$cat->name}}</td>
					<td>{{$cat->date_of_birth}}</td>
					<td><a href="cats/breeds/{{$cat->breed->name}}">{{$cat->breed->name}}</a></td>
					<td><a class="btn btn-warning" href="{{ url('cats/'.$cat->id.'/edit') }}">Edit</a></td>
					<td><a class="btn btn-danger" href="#">Delete</a></td>	
				</tr>
				@endforeach
			</tbody>
</table>
@stop