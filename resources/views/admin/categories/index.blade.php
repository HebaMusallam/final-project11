@extends('layouts.admin')
@section('content')
    <div class="py-3">
        <a href="{{route('category_create') }}" class="btn btn-success">Add Category</a>
    </div>
    <div class="py-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">category name</th>
                    <th scope="col">Events</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key=>$category)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ url('categories/delete/' . $category->id) }}" class="btn btn-danger">Delete</a>
                            <a href="{{ url('categories/edit/' . $category->id) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$categories->links()}}
    </div>
@endsection
