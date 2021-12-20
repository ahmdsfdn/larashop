@extends('layouts.global')

@section('title')
Edit Order
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif

        <form action="{{route('orders.update',[$order->id])}}" class="bg-white shadow-sm p-3" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <label for="">Invoice Number</label><br>
            <input type="text" class="form-control" value="{{$order-
                    >invoice_number}}" disabled>
            <br>
            <label for="">Buyer</label><br>
            <input type="text" disabled class="form-control" value="{{$order->user->name}}">
            <br>
            <label for="">Order Date</label><br>
            <input type="text" class="form-control" value="{{$order->created_at}}" disabled>
            <br>
            <label for="">Books {{$order->totalQuantity}}</label><br>
            <ul>
                @foreach ($order->books as $book)
                <li>{{$book->title}} <b>({{$book->pivot->quantity}})</b></li>
                @endforeach
            </ul>
            <label for="">Total Price</label><br>
            <input type="text" class="form-control" type="text" value="{{$order->total_price}}" disabled>
            <br>
            <label for="">Status</label><br>
            <select name="status" id="status" class="form-control">
                <option {{$order->status == 'SUBMIT' ? 'selected' : ''}} value="SUBMIT">SUBMIT</option>
                <option {{$order->status == 'PROCESS' ? 'selected' : ''}} value="PROCESS">PROCESS</option>
                <option {{$order->status == 'FINISH' ? 'selected' : ''}} value="FINISH">FINISH</option>
                <option {{$order->status == 'CANCEL' ? 'selected' : ''}} value="CANCEL">CANCEL</option>
            </select>
            <br>
            <input type="submit" class="btn btn-primary" value="Update">
        </form>
    </div>
</div>
@endsection