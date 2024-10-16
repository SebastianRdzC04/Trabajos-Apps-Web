@extends('layouts.index')

@section('title', 'Agregar Personas')

@section('main')

    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Agregar Personas</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('storePersona') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                        @if ($errors->has('nombre'))
                                            <div class="alert alert-danger">{{ $errors->first('nombre') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="apellido" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                                        @if ($errors->has('apellido'))
                                            <div class="alert alert-danger">{{ $errors->first('apellido') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                                        @if ($errors->has('fecha_nacimiento'))
                                            <div class="alert alert-danger">{{ $errors->first('fecha_nacimiento') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="user_id" class="form-label">Usuario</label>
                                        <select name="user_id" id="user_id" class="form-select">
                                            <option value="">Sin Usuario</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('user_id'))
                                            <div class="alert alert-danger">{{ $errors->first('user_id') }}</div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </form>
                                @if (session('status'))
                                    <div class="alert alert-success mt-3">{{ session('status') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Editar Personas</div>
                            <div class="card-body">
                                <form method="POST" action="{{route('updatePersona')}}" >
                                    @csrf
                                    @method('PATCH')
                                    <div class="mb-3">
                                        <label for="personas-edit" class="form-label">Nombre</label>
                                        <select name="personas-edit" id="personas-edit" class="form-select" onchange="fetchPersonaData()">
                                            <option value="">Selecciona una Persona</option>
                                            @foreach ($personas as $persona)
                                                <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre-edit" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre-edit" name="nombre-edit" required>
                                        @if ($errors->has('nombre'))
                                            <div class="alert alert-danger">{{ $errors->first('nombre') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="apellido-edit" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" id="apellido-edit" name="apellido-edit" required>
                                        @if ($errors->has('apellido'))
                                            <div class="alert alert-danger">{{ $errors->first('apellido') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="fecha_nacimiento-edit" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="fecha_nacimiento-edit" name="fecha_nacimiento-edit" required>
                                        @if ($errors->has('fecha_nacimiento'))
                                            <div class="alert alert-danger">{{ $errors->first('fecha_nacimiento') }}</div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </form>
                                @if (session('status-update'))
                                    <div class="alert alert-success mt-3">{{ session('status-update') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header">Eliminar Personas</div>
                            <div class="card-body">
                                <form method="POST" action="{{route('deletePersona')}}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="mb-3">
                                        <label for="personas-delete" class="form-label">Personas</label>
                                        <select name="personas-delete" id="personas-delete" class="form-select">
                                            <option value="">Selecciona una Persona</option>
                                            @foreach ($personas as $persona)
                                                <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                                @if (session('status-delete'))
                                    <div class="alert alert-success mt-3">{{ session('status-delete') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="js/agregar_personas.js"></script>    
@endsection