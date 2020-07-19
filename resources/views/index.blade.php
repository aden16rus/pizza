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
                                    <p>{{$product->description}}</p>
                                    
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
