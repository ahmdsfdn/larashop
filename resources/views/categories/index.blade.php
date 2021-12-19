@extends('layouts.global')
@section('title')
Category List
@endsection
@section('content')
@if(session('status'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-warning">
            {{session('status')}}
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <a href="{{route('categories.create')}}" class="btn btn-primary btn-sm">Create Category</a>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <form action="{{route('categories.index')}}">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Filter by category name" name="name">
                <div class="input-group-append">
                    <input type="submit" value="Filter" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link active">Published</a>
            </li>
            <li class="nav-item">
                <a href="{{route('categories.trash')}}" class="nav-link">Trash</a>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th><b>Name</b></th>
                    <th><b>Slug</b></th>
                    <th><b>Image</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->slug}}</td>
                    <td>
                        @if ($row->image)
                        <img src="{{asset('public/storage/'.$row->image)}}" width="147px" alt="">

                        @else

                        No image
                        @endif
                    </td>
                    <td>
                        <a href="{{route('categories.show',[$row->id])}}" class="btn btn-primary btn-sm">Show</a>
                        <a href="{{route('categories.edit', [$row->id])}}" class="btn btn-info btn-sm">Edit </a>
                        <form action="{{route('categories.destroy',[$row->id])}}" method="POST"
                            onsubmit="return confirm('Move category to trash?')">
                            @csrf
                            <input type="hidden" value="DELETE" name="_method">
                            <input type="submit" class="btn btn-danger btn-sm" value="Trash">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="10">
                        {{$categories->appends(Request::all())->links()}}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection