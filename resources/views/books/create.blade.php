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
        <form action="{{route('books.store')}}" method="post" enctype="multipart/form-data"
            class="shadow-sm p-3 bg-white">
            @csrf
            <label for="title">Title</label><br>
            <input type="text" name="title" class="form-control {{$errors->first('title') ? 'is-invalid' : ''}}" value="{{old('title')}}"
                placeholder="Book title">
            <div class="invalid-feedback">
                {{$errors->first('title')}}
            </div>
            <br>
            <label for="cover">Cover</label><br>
            <input type="file" name="cover" class="form-control {{$errors->first('cover')? 'is-invalid' : ''}}"
                placeholder="Book cover">
            <div class="invalid-feedback">
                {{$errors->first('cover')}}
            </div>
            <br>
            <label for="description">Description</label><br>
            <textarea name="description" id="description"
                class="form-control {{$errors->first('description') ? 'is-invalid' : ''}}"
                placeholder="Book description"
                placeholder="Give a description about this book">{{old('description')}}</textarea>
            <div class="invalid-feedback">
                {{$errors->first('description')}}
            </div>
            <br>
            <label for="stock">Stock</label><br>
            <input type="number" value="{{old('stock')}}"
                class="form-control {{$errors->first('stock') ? 'is-invalid' : ''}}" id="stock" name="stock" min=0
                value=0>
            <div class="invalid-feedback">
                {{$errors->first('stock')}}
            </div>
            <br>
            <label for="author">Author</label><br>
            <input type="text" class="form-control {{$errors->first('author') ? 'is-invalid' : ''}}" value="{{old('author')}}" name="author"
                id="author" placeholder="Book author">
            <div class="invalid-feedback">
                {{$errors->first('author')}}
            </div>
            <br>
            <label for="publisher">Publisher</label> <br>
            <input type="text" class="form-control  {{$errors->first('publisher') ? 'is-invalid' : ''}}" id="publisher" name="publisher"
                value="{{old('publisher')}}" placeholder="Book publisher">
            <div class="invalid-feedback">
                {{$errors->first('publisher')}}
            </div>
            <br>
            <label for="Price">Price</label> <br>
            <input type="number" value="{{old('price')}}" class="form-control  {{$errors->first('price') ? 'is-invalid' : ''}}" name="price"
                id="price" placeholder="Book price">
            <div class="invalid-feedback">
                {{$errors->first('price')}}
            </div>
            <br>
            <label for="categories">Categories</label>
            <select name="categories[]" multiple id="categories" class="form-control"></select>
            <br><br>
            <button class="btn btn-primary" name="save_action" value="PUBLISH">Publish</button>
            <button class="btn btn-secondary" name="save_action" value="DRAFT">Save as draft</button>
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
</script>
@endsection