@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>Checkout</h2></div>
                    <div class="card-body">
                        @if ($message)
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
