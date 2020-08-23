@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>Cart</h2></div>
                    <div class="card-body">
                        <div class="row">
                            @if(cart()->getItems())
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">Product</div>
                                        <div class="col-md-3">Quantity</div>
                                        <div class="col-md-3">Price</div>
                                    </div>
                                </div>
                                @foreach(cart()->getItems() as $item)
                                    <div class="card col-md-12 p-2 mb-2">
                                        <div class="row">
                                            <div class="col-md-6">{{$item['product']->title}}</div>
                                            <div class="col-md-3">
                                                {{Form::open(['route' => 'cart.update', 'class' => 'd-inline'])}}
                                                    <input type="hidden" name="product_id" value="{{$item['product']->id}}">
                                                    <input type="hidden" name="count" value="{{$item['count'] - 1}}">
                                                    <button class="btn btn-sm btn-info">-</button>
                                                {{ Form::close() }}
                                                {{ $item['count'] }}
                                                {{Form::open(['route' => 'cart.update', 'class' => 'd-inline'])}}
                                                <input type="hidden" name="product_id" value="{{$item['product']->id}}">
                                                <input type="hidden" name="count" value="{{$item['count'] + 1}}">
                                                <button class="btn btn-sm btn-info">+</button>
                                                {{ Form::close() }}
                                                <a class="btn btn-sm btn-danger" href="{{route('cart.remove', ['id' => $item['product']->id])}}">Remove</a>
                                            </div>
                                            <div class="col-md-3">{{ calcPrice($item['product']->price) }} {{ currency() }}</div>
                                        </div>
                                    </div>
                                @endforeach
                                <hr>
                                <div class="col-md-12 mt-2"><strong class="float-right">Products: {{ calcPrice(cart()->getTotal()) }} {{ currency() }}</strong></div>
                                <div class="col-md-12 mt-2"><strong class="float-right">Delivery cost: {{ calcPrice(deliveryCost()) }} {{ currency() }}</strong></div>
                                <div class="col-md-12 mt-2"><strong class="float-right">Total price: {{ calcPrice(cart()->getTotal() + deliveryCost()) }} {{ currency() }}</strong></div>
                                <hr>
                            <div class="col-md-12">
                                <a class="btn btn-warning mt-2" href="/cart/clear">Clear cart</a>
                                <a class="btn btn-info mt-2 float-right" href="{{ route('order.create') }}">Checkout</a>
                            </div>
                            @else
                                <div class="card col-md-12">Cart is empty</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
