@extends('layouts.app')
@section('content')
    <div class="title m-b-md">
        Stripe
    </div>

    <div class="links">
        <div class="btn-group">
            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Customers
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('customers.index') }}">All Customers</a>
                <a class="dropdown-item" href="#">Add Customer</a>
            </div>
        </div>
        <a class="btn btn-dark px-2 py-2 text-white" href="https://github.com/hemantind/stripe-laravel"><i
                class="fa fa-github" aria-hidden="true"></i>GitHub</a>
    </div>
@endsection
