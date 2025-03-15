@extends('layouts.admin')
@section('content')
    <div class="py-3">
        <form action="{{ url('products/update/'.$product->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="nameFormControlInput" class="form-label">product name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label for="quantityFormControlInput" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity"value="{{ $product->quantity }}">
                </div>
                <div class = "mb-3">
                    <label for="priceFormControlInput" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price"value=" {{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="descriptionformControlTextarea" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="descriptionformControlTextarea" class="form-label">Choose the category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" value="Save" class="btn btn-info">
            </div>
        </form>
    </div>
@endsection
{{-- $categories[$producut->category_id->id-1] --}}
{{-- $categories[$product->category_id-1->name] --}}
