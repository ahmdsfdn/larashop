@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card bg-white border">
                {{-- <div class="card-header bg-transparent border-0">{{__('Login')}}
                </div> --}}
                <div class="card-body">
                    <form aria-label="{{__('Login')}}" method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email" class="col-sm-12 col-form-label pl-0">{{__('E-Mail
                                    Address')}}</label>
                                <br>
                                <input type="email" id="email"
                                    class="form-control{{$errors->has('email')? ' is-invalid' : ''}}" name="email"
                                    value="{{old('email')}}" required autofocus>
                                @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('email')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-gruop row">
                            <div class="col-md-12">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-left pl-0">{{__('Password')}}</label>
                                <input type="password" id="password"
                                    class="form-control{{$errors->has('password') ? ' is-invalid' : ''}}"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback"
                                    role="alert"><strong>{{$errors->first('password')}}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <input type="checkbox" id="remember" name="remember" {{old('remember') ? 'checked'
                                        : '' }}> <label for="remember">{{__('Rembember Me')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn-block btn btn-primary">{{__('Login')}}</button><br>
                                <a class="btn btn-link pl-0" href="{{route('password.request')}}">{{__('Forgot Yout Password')}}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection