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
            <div class="col-md-12">
                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Description</th>
                        <th scope="col">Address</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Created</th>
                        <th scope="col">Currency</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <th>{{ $customer->id }}</th>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->description }}</td>
                            <td>
                                <pre class="text-white" style="text-align: left; max-width:300px">
                                    {{ $customer->address }}
                                </pre>
                            </td>
                            <td>{{ $customer->balance }}</td>
                            <td>{{ $customer->created }}</td>
                            <td>{{ $customer->currency }}</td>
                            <td>
                                <form action="{{ route('customers.destroy',$customer->id) }}" method="post" style="display:flex;">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('customers.show',$customer->id) }}"
                                       class="btn btn-link p-0 pr-1 pl-1"><i class="fa fa-eye text-white"></i></a>
                                    <a href="{{ route('customers.edit',$customer->id) }}"
                                       class="btn btn-link p-0 pr-1 pl-1"><i class="fa fa-edit text-white"></i></a>
                                    <button type="submit" class="btn btn-link p-0 pr-1 pl-1"><i
                                            class="fa fa-trash text-white"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
