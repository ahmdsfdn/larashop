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
            <input type="text" name="title" value="{{old('title') ? old('title') : $book->title}}"
                class="form-control {{$errors->first('title') ? " is-invalid" : "" }}" placeholder="Book title">
            <div class="invalid-feedback">
                {{$errors->first('title')}}
            </div>
            <br>
            <label for="cover">Cover</label><br>
            @if ($book->cover)
            <img src="{{asset('public/storage/'.$book->cover)}}" width="100px" alt="Cover Image">
            @endif
            <input type="file" name="cover" class="form-control {{$errors->first('cover') ? " is-invalid" : "" }}"
                placeholder="Book cover">
            <small class="text-muted">Abaikan jika tidak ingin merubah gambar</small>
            <div class="invalid-feedback">
                {{$errors->first('cover')}}
            </div>
            <br>
            <label for="description">Description</label><br>
            <textarea name="description" id="description" class="form-control {{$errors->first('description') ? "is-invalid" : ""}}" placeholder="Book description"
                placeholder="Give a description about this book">{{old('description') ? old('description') : $book->description}}</textarea>
            <div class="invalid-feedback">
                {{$errors->first('description')}}
            </div>
            <br>
            <label for="slug">Slug</label><br>
            <input type="text" class="form-control " value="{{old('slug') ? old('slug') : $book->slug}}" name="slug" placeholder="enter-a-slug" />
            <div class="invalid-feedback">
                {{$errors->first('slug')}}
            </div>
            <br>
            <label for="stock">Stock</label><br>
            <input type="number" class="form-control {{$errors->first('stock') ? "is-invalid" : ""}}" id="stock" name="stock" min=0 value="{{old('stock') ? old('stock') : $book->stock}}">
            <div class="invalid-feedback">
                {{$errors->first('stock')}}
            </div>
            <br>
            <label for="author">Author</label><br>
            <input type="text" value="{{old('author') ? old('author') : $book->author}}" class="form-control {{$errors->first('author') ? "is-invalid" : ""}}"" name="author" id="author"
                placeholder="Book author">
                <div class="invalid-feedback">
                    {{$errors->first('author')}}
                </div>
            <br>
            <label for="publisher">Publisher</label> <br>
            <input type="text" value="{{old('publisher') ? old('publisher') : $book->publisher}}" class="form-control {{$errors->first('publisher') ? "is-invalid" : ""}}"" id="publisher" name="publisher"
                placeholder="Book publisher">
                <div class="invalid-feedback">
                    {{$errors->first('publisher')}}
                </div>
            <br>
            <label for="Price">Price</label> <br>
            <input type="number" value="{{old('price') ? old('price') : $book->price}}" class="form-control {{$errors->first('price') ? "is-invalid" : ""}}"" name="price" id="price"
                placeholder="Book price">
                <div class="invalid-feedback">
                    {{$errors->first('price')}}
                </div>
            <br>
            <label for="categories">Categories</label>
            <select name="categories[]" multiple id="categories" class="form-control"></select>
            <br><br>
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control {{$errors->first('status') ? "is-invalid" : ""}}"">
                <option {{$book->status == 'PUBLISH' ? 'selected' : ''}} value="PUBLISH">PUBLISH</option>
                <option {{$book->status == 'DRAFT' ? 'selected' : ''}} value="DRAFT">DRAFT</option>
            </select>
            <div class="invalid-feedback">
                {{$errors->first('status')}}
            </div>
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