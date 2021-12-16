@extends('layouts.global')

@section('title') Edit User

@endsection

@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<form action="{{route('users.update',[$user->id])}}" method="POST" enctype="multipart/form-data"
    class="bg-white shadow-sm p-3">
    @csrf
    <input type="hidden" value="PUT" name="_method">
    <label for="name">Name</label>
    <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{$user->name}}" id="name">
    <br>
    <label for="username">Username</label>
    <input disabled class="form-control" placeholder="username" type="text" name="username" value="{{$user->username}}"
        id="username" />
    <br>
    <label for="">Status</label>
    <input {{$user->status== 'ACTIVE' ? 'checked' : ''}} type="radio" class="form-control" id="active" value="ACTIVE"
    name="status">
    <label for="active">Active</label>
    <input {{$user->status== 'INACTIVE' ? 'checked' : ''}} type="radio" class="form-control" id="inactive"
    value="INACTIVE"
    name="status">
    <label for="active">Inactive</label>
    <label for="">Roles</label>
    <br>
    <input type="checkbox" {{in_array("ADMIN", json_decode($user->roles)) ?
    "checked" : ""}}
    name="roles[]"
    id="ADMIN"
    value="ADMIN">
    <label for="ADMIN">Administrator</label>
    <input type="checkbox" {{in_array("STAFF", json_decode($user->roles)) ?
    "checked" : ""}}
    name="roles[]"
    id="STAFF"
    value="STAFF">
    <label for="STAFF">Staff</label>
    <input type="checkbox" {{in_array("CUSTOMER", json_decode($user->roles)) ?
    "checked" : ""}}
    name="roles[]"
    id="CUSTOMER"
    value="CUSTOMER">
    <label for="CUSTOMER">Customer</label>
    <br>

    <label for="phone">Phone Number</label>
    <br>
    <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
    <br>
    <label for="address">Address</label>
    <textarea name="address" id="address" class="form-control">{{$user->address}}</textarea>
    <br>
    <label for="avatar">Avatar image</label>
    <br>
    @if ($user->avatar)
    <img src="{{asset('public/storage/'.$user->avatar)}}" width="120px" alt="">
    <br>
    @else
    No Avatar
    @endif
    <input id="avatar" name="avatar" type="file" class="form-control">
    <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
    <hr class="my-3">
    <label for="email">Email</label>
    <input class="form-control" disabled value='{{$user->email}}' placeholder="user@mail.com" type="text" name="email"
        id="email" />
    <br>
    <input class="btn btn-primary" type="submit" value="Save" />
</form>
@endsection