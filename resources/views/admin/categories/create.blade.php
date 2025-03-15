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
        <form action="{{url('categories/store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nameFormControlInput" class="form-label">category name</label>
                <input type="text" class="form-control" id="name"  name="name" placeholder="product name">
            </div>
            <div class="mb-3">
                <input type="submit" value="Save" class="btn btn-info">
            </div>
        </form>
    </div>
@endsection
