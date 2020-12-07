@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h4 class="card-title">Name : {{ auth()->user()->name }}</h4>
                    <h4 class="card-title">Email : {{ auth()->user()->email }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
