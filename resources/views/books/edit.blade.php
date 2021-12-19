@extends('layouts.global')

@section('title')
Create Books
@endsection

@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="row">
    <div class="col-md-8">
        <form action="{{route('books.update',[$book->id])}}" method="post" enctype="multipart/form-data"
            class="shadow-sm p-3 bg-white">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <label for="title">Title</label><br>
            <input type="text" name="title" value="{{$book->title}}" class="form-control" placeholder="Book title">
            <br>
            <label for="cover">Cover</label><br>
            @if ($book->cover)
            <img src="{{asset('public/storage/'.$book->cover)}}" width="100px" alt="Cover Image">
            @endif
            <input type="file" name="cover" class="form-control" placeholder="Book cover">
            <small class="text-muted">Abaikan jika tidak ingin merubah gambar</small>
            <br>
            <label for="description">Description</label><br>
            <textarea name="description" id="description" class="form-control" placeholder="Book description"
                placeholder="Give a description about this book">{{$book->description}}</textarea>
            <br>
            <label for="slug">Slug</label><br>
            <input type="text" class="form-control" value="{{$book->slug}}" name="slug" placeholder="enter-a-slug" />
            <br>
            <label for="stock">Stock</label><br>
            <input type="number" class="form-control" id="stock" name="stock" min=0 value={{$book->stock}}>
            <br>
            <label for="author">Author</label><br>
            <input type="text" value="{{$book->author}}" class="form-control" name="author" id="author"
                placeholder="Book author">
            <br>
            <label for="publisher">Publisher</label> <br>
            <input type="text" value="{{$book->publisher}}" class="form-control" id="publisher" name="publisher"
                placeholder="Book publisher">
            <br>
            <label for="Price">Price</label> <br>
            <input type="number" value="{{$book->price}}" class="form-control" name="price" id="price"
                placeholder="Book price">
            <br>
            <label for="categories">Categories</label>
            <select name="categories[]" multiple id="categories" class="form-control"></select>
            <br><br>
           <label for="status">Status</label>
           <select name="status" id="status" class="form-control">
               <option {{$book->status == 'PUBLISH' ? 'selected' : ''}} value="PUBLISH">PUBLISH</option>
               <option {{$book->status == 'DRAFT' ? 'selected' : ''}} value="DRAFT">DRAFT</option>
           </select>
           <br>
           <button class="btn btn-primary" value="PUBLISH">Update</button>
        </form>
  
    </div>
</div>
@endsection
@section('footer-scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-
rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-
rc.0/js/select2.min.js"></script>
<script>
    $('#categories').select2({
    ajax: {
        url: 'http://localhost/larashop/ajax/categories/search',
        processResults: function(data){
            return {
                results: data.map(function(item){return {id: item.id, text: item.name} })
            }
        }
    }
    });

    var categories = {!! $book->categories !!}
    categories.forEach(function(category){
        var option = new Option(category.name, category.id, true, true);
        $('#categories').append(option).trigger('change');
    });
</script>
@endsection