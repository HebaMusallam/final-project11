@extends('layouts.admin')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
@endif
    <div class="py-3">
        <form action="{{ url('products/store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nameFormControlInput" class="form-label">product name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="product name">
            </div>
            <div class="mb-3">
                <label for="quantityFormControlInput" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity">
            </div>
            <div class="mb-3">
                <label for="priceFormControlInput" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="descriptionformControlTextarea" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="descriptionformControlTextarea" class="form-label">Choose the category</label>
                <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" value="Save" class="btn btn-info">
            </div>
        </form>
    </div>
@endsection
