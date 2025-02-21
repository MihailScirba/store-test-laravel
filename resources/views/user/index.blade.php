@extends('layouts.master')

@section('content')
    <main role="main">
        <div class="d-flex align-items-center justify-content-center" style="height: 90vh">
            <div class="card w-25">
                <div class="card-header">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="card-body">
                <form action="{{ route('user.handle_login') }}" method="POST">
                       @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" id="usernmae" placeholder="Username">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="btn-group mt-3 d-flex" role="group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('user.create') }}" class="btn btn-link">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
