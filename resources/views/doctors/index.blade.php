
@extends('layouts.panel')

@section('content')
<div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Medicos</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/medicos/create')}}" class="btn btn-sm btn-primary">Nueva Medico</a>
            </div>
          </div>
        </div>

        <div class="card-body">
            @if (session('notification'))
            <div class="alert alert-success" role="alert">

                {{session('notification')}}

            </div>
            @endif

        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Cedula</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($medicos as $medico)
                    
              <tr>
                <th scope="row">
                  {{$medico->name}}
                </th>
                <td>
                    {{$medico->email}}
                </td>
                <td>
                    {{$medico->cedula}}
                </td>
                <td>
                  
                  <form action="{{url('/medicos/'.$medico->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('medicos.edit',$medico)}}" class="btn btn-sm btn-primary ">Editar</a>

                    <button type="submit" class="btn btn-sm btn-danger" href="{{route('medicos.destroy',$medico)}}">Eliminar</button>

                  </form>
                  

                </td>
                
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
</div>
     
@endsection