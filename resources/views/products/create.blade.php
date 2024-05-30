@extends('products.layout')
@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Add new product</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-primary" href="{{route('products.index')}}">Back</a>
		</div>
	</div>
</div>
@if($errors->any())
<div class="alert alert-danger">
	<strong>oops!!</strong>
			there are problem in ur input
			<ul>@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
</div>
@endif
<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="row">
	<div class="col-xs-12 col-md-12 col-sm-12">
		<div class="form-group">
			<strong>name</strong>
			<input type="text" name="name" placeholder="name" class="form-control">
		</div>
	</div>
	<div class="col-xs-12 col-md-12 col-sm-12">
		<div class="form-group">
			<strong>detail</strong>
			<textarea type="text" name="detail"  style="height:150px;" class="form-control">
			</textarea>
		</div>
	</div>
    <div class="col-xs-12 col-md-12 col-sm-12">
		<div class="form-group">
			<strong>image</strong>
			<input type="file" name="image" placeholder="image" class="form-control">
		</div>
	</div>
	<div class="col-xs-12 col-md-12 col-sm-12 text-center">
		<button type="submit" class="btn btn-primary">submit</button>

	</div>
	</div>
</form>
@endsection