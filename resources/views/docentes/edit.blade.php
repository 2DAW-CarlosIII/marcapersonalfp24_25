@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar docente
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ action([App\Http\Controllers\DocentesController::class, 'getEdit'], ['id' => $id]) }}" method="POST">
                @method('PUT')
	            @csrf

	            <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $docente['nombre'] }}">
                 </div>

                 <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" value="{{ $docente['apellidos'] }}">
                 </div>

                 <div class="form-group">
                     <label for="direccion">Direccion</label>
                     <input type="text" name="direccion" id="direccion" value="{{ $docente['direccion'] }}">
                  </div>

                  <div class="form-group">
                     <label for="ciclo">Ciclo</label>
                     <input type="text" name="ciclo" id="ciclo" value="{{ $docente['ciclo'] }}">
                  </div>

                 <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                        Modificar docente
                    </button>
                 </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
