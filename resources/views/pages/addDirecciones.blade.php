@extends('layouts.index')

@section('title', 'Agregar Personas')

@section('main')

    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Agregar Direcciones</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('storeDireccion') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="calle" class="form-label">Calle</label>
                                        <input type="text" class="form-control" id="calle" name="calle" required>
                                        @if ($errors->has('calle'))
                                            <div class="alert alert-danger">{{ $errors->first('calle') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="numero" class="form-label">Numero</label>
                                        <input type="text" class="form-control" id="numero" name="numero" required>
                                        @if ($errors->has('numero'))
                                            <div class="alert alert-danger">{{ $errors->first('numero') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="colonia" class="form-label">Colonia</label>
                                        <input type="text" class="form-control" id="colonia" name="colonia" required>
                                        @if ($errors->has('colonia'))
                                            <div class="alert alert-danger">{{ $errors->first('colonia') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="persona_id" class="form-label">Persona</label>
                                        <select name="persona_id" id="persona_id" class="form-select">
                                            <option value="">Selecciona una Persona</option>
                                            @foreach ($personas as $persona)
                                                <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('persona_id'))
                                            <div class="alert alert-danger">{{ $errors->first('persona_id') }}</div>
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
                            <div class="card-header">Editar Direcciones</div>
                            <div class="card-body">
                                <form method="POST" action="{{route('updateDireccion')}}" >
                                    @csrf
                                    @method('PATCH')
                                    <div class="mb-3">
                                        <label for="direccion-edit" class="form-label">Direcciones</label>
                                        <select name="direccion-edit" id="direccion-edit" class="form-select" onchange="fetchDireccionData()">
                                            <option value="">Selecciona una Direccion</option>
                                            @foreach ($direcciones as $direccion)
                                                <option value="{{ $direccion->id }}">{{ $direccion->calle . ' ' . $direccion->numero . ' ' . $direccion->colonia }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="calle-edit" class="form-label">Calle</label>
                                        <input type="text" class="form-control" id="calle-edit" name="calle-edit" required>
                                        @if ($errors->has('calle'))
                                            <div class="alert alert-danger">{{ $errors->first('calle') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="numero-edit" class="form-label">Numero</label>
                                        <input type="text" class="form-control" id="numero-edit" name="numero-edit" required>
                                        @if ($errors->has('numero'))
                                            <div class="alert alert-danger">{{ $errors->first('numero') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="colonia-edit" class="form-label">Colonia</label>
                                        <input type="text" class="form-control" id="colonia-edit" name="colonia-edit" required>
                                        @if ($errors->has('colonia'))
                                            <div class="alert alert-danger">{{ $errors->first('colonia') }}</div>
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
                                <form method="POST" action="{{route('deleteDireccion')}}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="mb-3">
                                        <label for="direcciones-delete" class="form-label">Direcciones</label>
                                        <select name="direcciones-delete" id="direcciones-delete" class="form-select">
                                            <option value="">Selecciona una Persona</option>
                                            @foreach ($direcciones as $direccion)
                                                <option value="{{ $direccion->id }}">{{ $direccion->calle . ' ' . $direccion->numero . ' ' . $direccion->colonia }}</option>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header">Direcciones</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Calle</th>
                                            <th>Numero</th>
                                            <th>Colonia</th>
                                            <th>Persona de la direccion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pDirecciones as $direccion)
                                            <tr>
                                                <td>{{ $direccion->calle }}</td>
                                                <td>{{ $direccion->numero }}</td>
                                                <td>{{ $direccion->colonia }}</td>
                                                <td>
                                                    <form id="changePersona" method="POST" action="{{route('changeDireccionPersona')}}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="direccion-id" value="{{$direccion->id}}">
                                                        <select name="owner" id="owner" class="form-select" onchange="changeOwner(this)">
                                                            <option value="">{{ $direccion->persona->nombre }}</option>
                                                            @foreach ($personas as $persona)
                                                                @if($persona->id == $direccion->persona->id)
                                                                    @continue
                                                                @endif
                                                                <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                                                            @endforeach
                                                        </select>

                                                    </form>
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>


                                <div class="">
                                    {{ $pDirecciones->links('pagination::simple-bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="js/direcciones.js"></script>    
@endsection