@extends('admin.layouts.default')

@section('content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Products <a href="{{route('product.create')}}" class="btn btn-success ml-3">Add</a></div>

            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif


                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Role">
                            <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{ $product->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $product->title ?? '' }}
                                    </td>
                                    <td>
                                        @isset($product->image)
                                            <img src="{{$product->image}}">
                                        @endisset
                                    </td>
                                    <td>
                                        {{$product->price}}
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="{{ route('product.edit', $product->id) }}">Edit</a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
