@extends('layouts.index')

@section('title', 'Agregar Usuario')

@section('main')

    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Agregar Usuario</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required
                                            autofocus>
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
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" required>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Editar Usuarios</div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="mb-3">
                                        <label for="usuarios" class="form-label">Usuario a Editar</label>
                                        <select name="usuarios-edit" id="usuarios-edit" class="form-select">
                                            <option value="">Selecciona un Usuario</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label" for="username-edit">Nombre</label>
                                        <input type="text" name="usename-edit" id="username-edit" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for=""></label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header">Usuarios</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>UserName</th>
                                            <th>Correo</th>
                                            <th>Estado</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usersP as $userP)
                                                <tr>
                                                    <td><button class="editar-btn btn">editar</button></td>
                                                    <td><input type="text" name="username" class="form-control"
                                                            value="{{ $userP->username }}" readonly></td>
                                                    <td><input type="text" name="email" class="form-control"
                                                            value="{{ $userP->email }}" readonly></td>
                                                    <td>
                                                        <form action="{{ route('changeState') }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="id"
                                                                value="{{ $userP->id }}">
                                                            <select name="estado" id="estado{{$userP->id}}" class="form-select"
                                                                onchange="">
                                                                @if ($userP->isOn)
                                                                    <option value="1">Activo</option>
                                                                    <option value="0">Inactivo</option>
                                                                @else
                                                                    <option value="0">Inactivo</option>
                                                                    <option value="1">Activo</option>
                                                                @endif
                                                            </select>
                                                        </form>
                                                    </td>
                                                    <td><button class="btn confirmar-btn" style="display: none" >confirmar</button></td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                                <div class="">
                                    {{ $usersP->links('pagination::simple-bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection




@section('scripts')
<script src="{{ asset('js/usuarios_script.js')}}"></script>
@endsection