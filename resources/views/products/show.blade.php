@extends('products.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>
		<td><img src="/image/{{$product->image}}" width="300px">image</td>
		<br><td>name:</td>
		<td>{{$product->name}}</td>
		<br><td>details:</td>
		<td>{{$product->detail}}</td>
	@endsection