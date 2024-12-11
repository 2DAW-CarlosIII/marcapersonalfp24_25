@extends('layouts.master')

@section('content')

    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Nombre: </strong>{{ $docente->nombre }}</h3>
            <h4><strong>Apellido: </strong>{{ $docente->apellido}}     </h4>
            <h4><strong>Direccion: </strong>{{ $docente->direccion }}</h4>
            <h4><strong>Ciclo: </strong>{{ $docente->ciclo }}</h4>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\DocentesController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar docente
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\DocentesController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection

