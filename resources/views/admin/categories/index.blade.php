@extends('layouts.admin')
@section('content')
    <div class="py-3">
        <a href="{{ url('categories/create') }}" class="btn btn-success">Add Category</a>
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
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ url('categories/delete/' . $category->id) }}" class="btn btn-danger">Delete</a>
                            <a href="{{ url('categories/edit/' . $category->id) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
