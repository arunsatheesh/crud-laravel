@extends('products.layout')
@section('content')
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>crud </h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{route('products.create')}}">create new product</a>
		</div>

	</div>
</div>
@if($message=Session::get('success'))
<div class="alert alert-success">
	<p>{{$message}}</p>
</div>
@endif
<table class="table table-bordered">
	<tr>
		<th>no.</th>
		<th>image</th>
		<th>name</th>
		<th>details</th>
		<th width="280px">Action</th>

	</tr>
	@foreach($products as $product)
	<tr>
		<td>{{++$i}}</td>
		<td><img src="/image/{{$product->image}}" width="100px"></td>
		<td>{{$product->name}}</td>
		<td>{{$product->detail}}</td>
		<td> 
		<form action="{{route('products.destroy',$product->id)}}" method="post" >
			<a class="btn btn-info" href="{{route('products.show',$product)}}">show</a>
			<a class="btn btn-primary" href="{{route('products.edit',$product->id)}}">edit</a>
			@csrf
			@method('delete')
			<button type="submit" onclick="return confirm('dou you really want to delete student')" class="btn btn-danger xs">delete</button>
		</form>
		</td>
	</tr>
	@endforeach
</table>
{!!$products->links() !!}
@endsection