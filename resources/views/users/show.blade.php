@extends('layouts.global')
@section('title') Detail user @endsection
@section('pageTitle') Detail user @endsection

@section('content')

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <b>Name:</b> <br>
            {{$user->name}}
            <br><br>
            @if ($user->avatar)
            <img src="{{asset('public/storage/'.$user->avatar)}}" width="128px">
            @else
            No Avatar
            @endif

            <br><br>
            <b>Username:</b><br>
            {{$user->username}}
            <br><br>
            <b>Phone Number</b><br>
            {{$user->phone}}
            <br><br>
            <b>Address</b><br>
            {{$user->address}}
            <br><br>
            <b>Roles:</b><br>
            @foreach (json_decode($user->roles) as $role)
            &middot; {{$role}} <br>
            @endforeach
        </div>
    </div>
</div>

@endsection