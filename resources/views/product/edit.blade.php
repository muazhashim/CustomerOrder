@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('product.update',$product) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">product name</label>

                            <div class="col-md-6">
                                <input value="{{$product->product_name}}" id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="product name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">price</label>

                            <div class="col-md-6">
                                <input value="{{$product->price}}" id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="price"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

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