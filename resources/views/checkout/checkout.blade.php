@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>Checkout</h2></div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">Product</div>
                                    <div class="col-md-3">Quantity</div>
                                    <div class="col-md-3">Price</div>
                                </div>
                            </div>
                            @foreach(cart()->getCart() as $item)
                                <div class="card col-md-12 p-2 mb-2">
                                    <div class="row">
                                        <div class="col-md-6">{{$item['product']->title}}</div>
                                        <div class="col-md-3">
                                            {{ $item['count'] }}
                                        </div>
                                        <div class="col-md-3">{{ calcPrice($item['product']->price) }} {{ currency() }}</div>
                                    </div>
                                </div>
                            @endforeach
                            <hr>
                            <div class="col-md-12 mt-2"><strong class="float-right">Total: {{ calcPrice(cart()->getTotal()) }} {{ currency() }}</strong></div>
                            <hr>
                            <div class="card-body">
                                {{Form::open(['route' => 'order.store'])}}
                                {{Form::hidden('total', calcPrice(cart()->getTotal()))}}
                                {{Form::hidden('currency', currency())}}
                                <div class="form-group">
                                    {{Form::label('name', 'Name')}}
                                    {{Form::text('name', null, ['class' => 'form-control', 'required'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('address', 'Address')}}
                                    {{Form::text('address', null, ['class' => 'form-control', 'required'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::submit('Order my pizza', ['class' => 'btn btn-success'])}}
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
