@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>Your orders</h2></div>
                    <div class="card-body">
                        @isset($orders)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">Id</div>
                                        <div class="col-md-3">Total</div>
                                        <div class="col-md-7">Date</div>
                                    </div>
                                </div>
                                @foreach($orders as $order)
                                    <div class="card col-md-12 p-2 mb-2">
                                        <div class="row">
                                            <div class="col-md-2">{{ $order->id }}</div>
                                            <div class="col-md-3">{{ $order->total }} {{ $order->currency }}</div>
                                            <div class="col-md-7">{{ $order->created_at }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
