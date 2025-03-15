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
<div class="py-5">
    <form action="{{url('categories/update/'.$category->id)}}" method="post">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label for="nameFormControlInput" class="form-label">category name</label>
        <input type="text" class="form-control" id="name" value="{{$category->name}}"  name="name" placeholder="product name">
    </div>
    <div class="mb-3">
        <input type="submit" value="Save" class="btn btn-info">
    </div>
</form>
    </form>
</div>
@endsection
