@extends('layouts.global')

@section('title')
Create Category
@endsection
@section('pageTitle')
Create Category
@endsection
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
<form action="{{route('categories.store')}}" class="bg-white shadow-sm p-3" enctype="multipart/form-data" method="POST">
    @csrf
    <label for="">Category Name</label>
    <input type="text" class="form-control" name="name">
    <br>
    <label for="">Category Image</label>
    <input type="file" class="form-control" name="image">
    <br>
    <input type="submit" class="btn btn-primary" value="save">
</form>
@endsection