@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Order') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('order.update',$order) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">order date</label>

                            <div class="col-md-6">
                                <input value="{{$order->order_date}}" id="name" type="date"
                                    class="form-control @error('name') is-invalid @enderror" name="order_date"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">order total</label>

                            <div class="col-md-6">
                                <input value="{{$order->order_total}}" id="name" type="number" min="1" max="1000"
                                    class="form-control @error('name') is-invalid @enderror" name="order_total"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                <label for="password" class="col-md-4 col-form-label">payment
                                    type</label>
                                <select name="payment type" class="form-select" aria-label="Default select example">
                                    <option value="" selected disable>Select payment</option>
                                    <option value="credit card">Credit Card</option>
                                    <option value="debit card">Debit Card</option>
                                    <option value="tng Ewallet">Tng E-wallet</option>
                                </select>
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection