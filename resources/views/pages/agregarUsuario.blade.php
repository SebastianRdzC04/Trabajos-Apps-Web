@extends('layouts.index')

@section('title', 'Agregar Usuario')

@section('main')

    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Agregar Usuario</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('register')}}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required autofocus>
                                @if ($errors->has('username'))
                                    <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection