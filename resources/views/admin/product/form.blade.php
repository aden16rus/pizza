@extends('admin.layouts.default')

@section('content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Products</div>

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
                @if(isset($product))
                    {{Form::model($product, ['route' => ['product.update', $product->id], 'files' => true])}}
                    <input type="hidden" name="_method" value="PATCH">
                @else
                    {{Form::open(['route' => 'product.store', 'files' => true])}}
                @endif
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', isset($product)?$product->title:'', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description', isset($product)?$product->description:'',['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('image', 'Image')}}
                    {{Form::file('image', ['class' => 'form-control-file'])}}
                    @if(isset($product) && $product->image)
                        <img src="{{$product->image}}" class="mt-3">
                    @endif
                </div>
                <div class="form-group">
                    {{Form::label('price', 'Price')}}
                    {{Form::number('price', isset($product)?$product->price:'', ['class' => 'form-control'])}}
                </div>
                    <div class="form-group">
                        {{Form::submit('Save', ['class' => 'btn btn-success'])}}
                        {{link_to_route('product.index', 'Go back', '', ['class' => 'btn btn-warning'])}}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
