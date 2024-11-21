@extends('layouts.master')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
       <div class="card">
          <div class="card-header text-center">
             Modificar Reconocimiento
          </div>
          <div class="card-body" style="padding:30px">

             <form action="{{ url('/reconocimiento/create') }}" method="POST">
                @method('PUT')

                 @csrf

                 <div class="form-group">
                    <label for="estudiante">Estudiante</label>
                    <input type="number" name="estudiante" id="estudiante_id" class="form-control">
                 </div>

                 <div class="form-group">
                     <label for="actividad_id">Actividad</label>
                    <input type="number" name="actividad_id" id="actividad_id">
                 </div>

                 <div class="form-group">
                     <label for="documento">Documento</label>
                    <input type="url" name="documento" id="documento">
                 </div>

                 <div class="form-group">
                     <label for="fecha">Fecha</label>
                    <input type="fecha" name="fecha" id="fecha">
                 </div>

                 <div class="form-group">
                     <label for="docente_validador">Docente</label><br />
                    <input type="number" name="docente_validador" id="docente_validador" class="form-control">
                 </div>

                 <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                        Modificar Reconocimiento
                    </button>
                 </div>

             </form>

          </div>
       </div>
    </div>
 </div>
 @endsection
