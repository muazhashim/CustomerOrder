@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ProductModal">
        Create Products
    </button>

    <!-- Modal -->
    <div class="modal fade" id="ProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Products</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('product.store') }}">
                        @csrf
                        <div class="mb-3">

                            <label for="exampleInputEmail1" class="form-label">product name</label>
                            <input type="type" class="form-control" name="product_name" id="exampleInputEmail1"
                                aria-describedby="emailHelp">

                            </select>

                            <label for="exampleInputEmail1" class="form-label">price</label>
                            <input type="number" class="form-control" name="price" id="exampleInputEmail1"
                                aria-describedby="emailHelp">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                                <button type="submit" class="btn btn-primary">create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">PRODUCT</div>
                <div class="card-toolbar">
                    <!-- Button trigger modal -->



                </div>
                <div class="card-body">

                <form action="{{route('product.search')}}" method="GET">
                            <div class="input-group-append mt-2 p-1">
                                <input type="text" class="form-control" name="keyword" placeholder="Search by Inventory Name">
                                <div class="input-group-append mt-2">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{route('home')}}" button class="btn btn-primary" type="submit">Refresh</button></a>
                                </div>
                            </div>
                        </form>

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>


                    @endif

                    {{ __('You are logged in!') }}
                    <!-- table product-->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Products</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        @foreach ($products as $key => $product)
                        <tbody>
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->price}}</td>
                                <td> <a href="{{route('product.edit', $product)}}" type="button"
                                        class="btn btn-primary">edit</a>
                                    <form action="{{route('product.destroy', $product)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach

                    </table>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        order
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Order now!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">

                                            <label class="col-form-label">Default file input example</label>
                                            <input class="form-control" type="file" name="image">

                                            <label for="name" class="col-md-4 col-form-label">order total</label>
                                            <input type="number" class="form-control" name="order total"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" min="1" max="1000">

                                            <label for="name" class="col-md-4 col-form-label">order date</label>
                                            <input type="date" class="form-control" name="order date"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                            <id="exampleInputEmail1" aria-describedby="emailHelp">

                                                <label for="password" class="col-md-4 col-form-label">payment
                                                    type</label>
                                                <select name="payment type" class="form-select"
                                                    aria-label="Default select example">
                                                    <option value="" selected disable>Select payment</option>
                                                    <option value="credit card">Credit Card</option>
                                                    <option value="debit card">Debit Card</option>
                                                    <option value="tng Ewallet">Tng E-wallet</option>
                                                </select>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">cancel</button>
                                                    <button type="submit" class="btn btn-primary">order</button>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header">ORDER</div>
            <div class="card-toolbar">
                <!-- Button trigger modal -->



            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>


                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">order date</th>
                            <th scope="col">order total</th>
                            <th scope="col">payment type</th>
                            <th scope="col">image</th>
                        </tr>
                    </thead>
                    @foreach ($orders as $key => $order)
                    <tbody>
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$order->order_date}}</td>
                            <td>{{$order->order_total}}</td>
                            <td>{{$order->payment_type}}</td>
                            <td>
                                <img src="{{ asset('storage/order/'.$order->image) }}" alt="order 1">
                            </td>
                            <td> <a href="{{route('order.edit', $order)}}" type="button"
                                    class="btn btn-primary">edit</a>
                                <form action="{{route('order.destroy', $order)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                @endsection
