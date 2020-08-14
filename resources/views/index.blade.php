@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>Our delicious menu</h2></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="card p-3 col-md-4">
                                    <h3>{{$product->title}}</h3>
                                    <img src="{{$product->image}}" alt="{{$product->title}}">
                                    <p class="mt-2">{{$product->description}}</p>

                                    <p class="mt-2">Price: <strong>{{$product->price}} USD</strong></p>

                                    {{Form::open(['route' => 'cart.add'])}}
                                        <div class="container">
                                            <div class="row">
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input class="form-control col-sm-5" type="number" name="count" value="1" min="1" step="1">
                                                <button class="btn btn-success col-sm-6 offset-1">Add to Cart</button>
                                            </div>
                                        </div>
                                    {{Form::close()}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
