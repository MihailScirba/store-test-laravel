@extends('layouts.master')

@section('custom_style')
    <style>
        /* Hide spin buttons in WebKit-based browsers (Chrome, Safari, Edge, Opera) */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Hide spin buttons in Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content')
    <div class=" d-flex justify-content-center mt-5">
        <a href="{{ route('products.index') }}" class="btn btn-success w-25">Go back to shop</a>
    </div>
    <section class="h-100">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0">Shopping Cart</h3>
                        <div>
                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                    class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                        </div>
                    </div>

                    @foreach ($cartItems as $item)
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ asset($item->product->image) }}" class="img-fluid rounded-3"
                                            alt="Image failed" />
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2">{{ $item->product->name }}</p>
                                    </div>

                                    <form action="{{ route('cart.quantity_manager', $item->id) }}" method="POST"
                                        class="col-md-3 col-lg-3 col-xl-2">
                                        @csrf
                                        <div class="d-flex" style="gap: 10px;">
                                            <button type="submit" name="action" value="decrement" class="btn btn-dark"
                                                data-mdb-button-init data-mdb-ripple-init>
                                                -
                                            </button>

                                            <input id="form1" min="1" name="quantity"
                                                value="{{ $item->quantity }}" type="number"
                                                class="form-control form-control-sm" />

                                            <button type="submit" name="action" value="increment" class="btn btn-dark"
                                                data-mdb-button-init data-mdb-ripple-init>
                                                +
                                            </button>
                                        </div>
                                    </form>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0">{{ $item->quantity * $item->product->price }} $</h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="card mb-4">
                        <div class="card-body p-4 d-flex flex-row">
                            <div data-mdb-input-init class="form-outline flex-fill">
                                <input type="text" id="form1" class="form-control form-control-lg" />
                                <label class="form-label" for="form1">Discound code</label>
                            </div>
                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-outline-warning btn-lg ms-3">Apply</button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body d-flex">
                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-warning btn-block btn-lg w-100">Proceed to Pay</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
