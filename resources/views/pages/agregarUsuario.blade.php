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
                                            <th>UserName</th>
                                            <th>Correo</th>
                                            <th>Estado</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usersP as $userP)
                                            <tr>
                                                <td>{{ $userP->username }}</td>
                                                <td>{{ $userP->email }}</td>
                                                <td>
                                                    <form action="{{route('changeState')}}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="id" value="{{ $userP->id }}">
                                                        <select name="estado" id="estado" class="form-select" onchange="changeOwner(this)">
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
    <script>
        const changeOwner = (selectElement) => {
            if (!confirm('¿Estás seguro de cambiar de dueño?')) {
                //si la persona niega el confirm que tampoco cambie el valor del select, que se quede como estaba antes de darle click al boton
                document.getElementById('estado').value = document.getElementById('estado').dataset.originalValue;

                return;
            }

            const newOwner = document.getElementById('estado').value;
            const form = selectElement.closest('form');
            form.submit();
}
    </script>

@endsection
