@extends('layouts.admin')
@section('content')
<div class="py-3">
    <a href="{{route('product_create') }}" class="btn btn-success">Add Product</a>
</div>
<div class="py-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Events</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $key=>$product)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$product->name}}</td>
                <td> {{$product->category->name}} </td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td></td>
                <td>
                    <a href="{{url('products/delete/'.$product->id)}}" class="btn btn-danger">Delete</a>
                    <a href="{{url('products/edit/'.$product->id)}}" class="btn btn-info">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
      {{$products->links()}}
</div>
@endsection
