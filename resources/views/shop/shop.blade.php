@extends('layouts.master')

@section('custom_style')
    <style>
        main * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .grid-container {
            margin: 50px 0;
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 330px));
            gap: 20px;
            justify-content: center;
        }

        .pr-card {
            height: 500px;
            padding: 5%;
            border: 1px solid gray;
            border-radius: 1em;
        }

        .pr-card-header,
        .pr-card-body>* {
            margin-bottom: 5%;
        }

        .pr-card-header,
        .pr-card-header img {
            border-radius: .5em;
        }

        .pr-card-header {
            height: 40%;
            width: 100%;
        }

        .pr-card-header img {
            height: 100%;
            width: 100%;
        }

        .pr-card-body *:not(h3) {
            font-size: 1em;
        }

        .pr-card-body .pr-description {
            overflow-x: auto;
            overflow-y: scroll;
            height: 120px;
        }

        .pr-card-body .price-and-stock {
            display: flex;
            justify-content: space-between;

            * {
                font-weight: bold;
            }
        }

        .pr-card-body .in-stock {
            color: green;
        }

        .pr-card-body .not-in-stock {
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class=" d-flex justify-content-center mt-5">
        <a href="{{ route('cart.index') }}" class="btn btn-success w-25">Cart</a>
    </div>
    <div class="grid-container">
        @foreach ($products as $product)
            <div class="pr-card">
                <div class="pr-card-header">
                    <img src="{{ asset($product->image) }}" alt="unloaded image">
                </div>
                <div class="pr-card-body">
                    <h3 class="name">{{ $product->name }}</h3>
                    <p class="pr-description">{{ $product->description }}</p>
                    <div class="price-and-stock">
                        @php
                            $stockText = $product->stock > 0 ? 'In stock' : 'Not in stock';
                            $stockColorClass = $product->stock > 0 ? 'in-stock' : 'not-in-stock';
                        @endphp
                        <div class="price">{{ $product->price }} $</div>
                        <div class="stock {{ $stockColorClass }}">{{ $stockText }}</div>
                    </div>
                </div>
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-dark w-100">Add to cart</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
