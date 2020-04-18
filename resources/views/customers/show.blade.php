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
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                {{--<div class="card color-black">
                    <pre>
                        {{ $customer }}
                    </pre>
                </div>--}}

                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th scope="col">
                            <div class="float-left">Data</div>
                            <div class="float-right">
                                <form action="{{ route('customers.destroy',$customer->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('customers.edit',$customer->id) }}"
                                       class="btn btn-link p-0 pr-1 pl-1"><i class="fa fa-edit text-white"></i></a>
                                    <button type="submit" class="btn btn-link p-0 pr-1 pl-1"><i
                                            class="fa fa-trash text-white"></i></button>
                                </form>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <pre class="text-white text-white" style="text-align: start">
                                    {{ $customer }}
                                </pre>
                            </th>
                        </tr>
                    {{--endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
