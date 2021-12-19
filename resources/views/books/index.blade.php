@extends('layouts.global')

@section('title')
Books List
@endsection
@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif


<div class="row">
    <div class="col-md-6"> <a href="{{route('books.create')}}" class="btn btn-primary btn-sm">Create books</a></div>
    <div class="col-md-6">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a class="nav-link {{Request::get('status') == NULL ? 'active' : ''}}" href="{{route("books.index")}}">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::get('status') == 'publish' ? 'active' : ''}}" href="{{route("books.index",['status'=> 'publish'])}}">Publish</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::get('status') == 'draft' ? 'active' : ''}}" href="{{route("books.index",['status'=> 'draft'])}}">
                    Draft</a>
            </li>
            <li class="nav-item">
                <a href="{{route('books.trash')}}"
                    class="nav-link {{Request::path() == 'books/trash' ? 'active' : ''}}">Trash</a>
            </li>
        </ul>
    </div>
</div>
<hr class="my-3">

<hr class="my-3">
<form action="{{route('books.index')}}">
    <div class="input-group">
        <input  name="keyword" type="text" class="form-control" placeholder="Filter by title" value="{{Request::get('keyword')}}">
        <div class="input-group-append">
            <input type="submit" value="Filter" class="btn btn-primary">
        </div>
    </div>
</form>


<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th><b>Cover</b></th>
                    <th><b>Title</b></th>
                    <th><b>Author</b></th>
                    <th><b>Status</b></th>
                    <th><b>Categories</b></th>
                    <th><b>Stock</b></th>
                    <th><b>Price</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>@if ($book->cover)
                        <img width="100px" src="{{asset('public/storage/'.$book->cover)}}" alt="">
                        @endif
                    </td>
                    <td>
                        {{$book->title}}
                    </td>
                    <td>{{$book->author}}</td>
                    <td>
                        @if ($book->status == 'DRAFT')
                        <span class="badge bg-dark text-white">
                            {{$book->status}}
                        </span>
                        @else
                        <span class="badge bg-success">
                            {{$book->status}}
                        </span>
                        @endif
                    </td>
                    <td>
                        <ul class="pl-3">
                            @foreach ($book->categories as $row)
                            <li>{{$row->name}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{$book->stock}}</td>
                    <td>{{$book->price}}</td>
                    <td>
                        <a href="{{route('books.show',[$book->id])}}" class="btn btn-primary btn-sm">Show</a>
                        <a href="{{route('books.edit',[$book->id])}}" class="btn btn-info btn-sm">Edit</a>
                        <form class="d-inline" onsubmit="return confirm('Move book to trash?')"
                            action="{{route('books.destroy',[$book->id])}}" method="POST">
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
                        {{$books->appends(Request::all())->links()}}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection