@extends('layouts.global')
@section('title')
Edit Category
@endsection
@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<form action="{{route('categories.update',[$categories->id])}}" class="bg-white shadow-sm p-3" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="hidden" value="PUT" name="_method">
    <label for="">Category Name</label>
    <input type="text" value="{{$categories->name}}" class="form-control" name="name">
    <br>
    <label for="">Slug</label>
    <input type="text" value="{{$categories->slug}}" class="form-control" name="slug">
    <br>
    <label for="">Category Image</label>
    <br>
    @if ($categories->image)
        <img src="{{asset('public/storage/'.$categories->image)}}" alt="gambar kategori" width="150px">
    @endif
    <input type="file" class="form-control" name="image">
    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
    <br>
    <input type="submit" class="btn btn-primary" value="save">
</form>
@endsection