
@extends('layouts.panel')

@section('content')
<div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0"> Nueva Especialidad</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/especialidades')}}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar</a>
            </div>
          </div>
        </div>

        <div class=" card-body">
            <form action="{{url('especialidades')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre de la especialidad</label>
                     <input type="text" name="name" class="form-control">


                </div>
                <div class="form-group">
                    <label for="description">Descripcion</label>
                     <input type="text" name="description" class="form-control">


                </div>

              <button type="submit" class="btn btn-sm btn-primary">Crear Especialidad </button>
            </form>
        </div>
        
</div>
     
@endsection