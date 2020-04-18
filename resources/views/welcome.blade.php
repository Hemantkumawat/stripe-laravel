@extends('layouts.app')
@section('header')
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
@endsection
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
