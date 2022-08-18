<?php
   use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')
<div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0"> Editar Médico</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/medicos')}}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar</a>
            </div>
          </div>
        </div>

        <div class=" card-body">

            @if ($errors->any())

               @foreach ($errors->all() as $error)

                  <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Por favor!!</strong> {{$error}}
                  </div>
                   
               @endforeach
                
            @endif



            {!! Form::model($medico, ['route' => ['medicos.update', $medico], 'method' => 'put','files'=>true, 'class'=>'formulario']) !!}
                @csrf
                <div class="form-group">
                    <label for="name">Nombre del Medico</label>
                     <input type="text" name="name" class="form-control" value="{{old('name',$medico->name)}}">


                </div>
                <div class="form-group">
                    <label for="email">Correo Electronico</label>
                     <input type="email" name="email" class="form-control" value="{{old('email',$medico->email)}}">


                </div>
                <div class="form-group">
                    <label for="cedula">Cédula</label>
                     <input type="text" name="cedula" class="form-control" value="{{old('cedula',$medico->cedula)}}">


                </div>
                <div class="form-group">
                    <label for="address">Dirección</label>
                     <input type="text" name="address" class="form-control" value="{{old('address',$medico->address)}}">


                </div>
                <div class="form-group">
                    <label for="phone">Teléfono / Movil</label>
                     <input type="text" name="phone" class="form-control" value="{{old('phone',$medico->phone)}}">


                </div>
                <div class="form-group">
                  <label for="password">Contraseña</label>
                   <input type="text" name="password" class="form-control">

                <small class="text-warning"> Solo llena el campo s desea cambiar la contraseña.
                </small>
              </div>

              <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios </button>
              {!! Form::close() !!}
            </div>
        
</div>
     
@endsection