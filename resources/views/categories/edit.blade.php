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
    <input type="text" value="{{old('name') ? old('name') : $categories->name}}" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" name="name">
    <div class="invalid-feedback">
        {{$errors->first('name')}}
    </div>
    <br>
    <label for="">Slug</label>
    <input type="text" value="{{old('slug') ? old('slug') : $categories->slug}}" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" name="slug">
    <div class="invalid-feedback">
        {{$errors->first('slug')}}
    </div>
    <br>
    <label for="">Category Image</label>
    <br>
    @if ($categories->image)
        <img src="{{asset('public/storage/'.$categories->image)}}" alt="gambar kategori" width="150px">
    @endif
    <input type="file" class="form-control {{$errors->first('image') ? 'is-invalid' : ''}}" name="image">
    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
    <div class="invalid-feedback">
        {{$errors->first('image')}}
    </div>
    <br>
    <input type="submit" class="btn btn-primary" value="save">
</form>
@endsection