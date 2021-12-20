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
    <input value="{{old('name')}}" type="text" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" name="name">
    <div class="invalid-feedback">
        {{$errors->first('name')}}
    </div>
    <br>
    <label for="">Category Image</label>
    <input type="file" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}" name="image">
    <div class="invalid-feedback">
        {{$errors->first('image')}}
    </div>
    <br>
    <input type="submit" class="btn btn-primary" value="save">
</form>
@endsection