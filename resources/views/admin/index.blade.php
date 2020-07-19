@extends('admin.layouts.default')

@section('content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                admin panel
            </div>
        </div>
    </div>
@endsection
