@extends('layouts.master')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <table class="table table-striped w-75">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>
                            <img src="{{ asset($item->product->image) }}" alt="uploaded image"
                                style="width: 100; height: 100px">
                        </td>
                        <td>
                            {{ $item->product->name }}
                        </td>
                        <td>
                            {{ $item->quantity }}
                        </td>
                        <td>
                            <form action="">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
