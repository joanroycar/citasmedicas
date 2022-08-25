
@extends('layouts.panel')

@section('content')

<form action="{{url('medicos/horariostore')}}" method="POST">
    @csrf
<div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Gestionar Horario</h3>
            </div>
            <div class="col text-right">
              <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios</button>
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
                <th scope="col">Día</th>
                <th scope="col">Activo</th>
                <th scope="col">Turno Mañana</th>
                <th scope="col">Turno Tarde</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($days as $key => $day)

                <tr>
                    <th>{{$day}}</th>
                    <td>
                        <label class="custom-toggle">
                            <input type="checkbox" name="active[]" value="{{$key}}" checked>
                            <span class="custom-toggle-slider rounded-circle"></span>
                          </label>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <select class="form-control" id="" name="morning_start[]">

                                    @for($i=8;$i<=11;$i++)


                                       <option value="{{$i}}:00">

                                        {{$i}}:00 AM

                                       </option>
                                       <option value="{{$i}}:30">

                                        {{$i}}:30 AM

                                       </option>
                                    @endfor

                                </select>

                            </div>
                            <div class="col">
                                <select class="form-control" id="" name="morning_end[]">

                                    @for($i=8;$i<=11;$i++)


                                       <option value="{{$i}}:00">

                                        {{$i}}:00 AM

                                       </option>
                                       <option value="{{$i}}:30">

                                        {{$i}}:30 AM

                                       </option>
                                    @endfor

                                </select>

                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <select class="form-control" id="" name="afternoon_start[]">

                                    @for($i=2;$i<=11;$i++)


                                       <option value="{{$i+12}}:00">

                                        {{$i}}:00 PM

                                       </option>
                                       <option value="{{$i+12}}:30">

                                        {{$i}}:30 PM

                                       </option>
                                    @endfor

                                </select>

                            </div>
                            <div class="col">
                                <select class="form-control" id="" name="afternoon_end[]">

                                    @for($i=2;$i<=11;$i++)


                                       <option value="{{$i+12}}:00">

                                        {{$i}}:00 PM

                                       </option>
                                       <option value="{{$i+12}}:30">

                                        {{$i}}:30 PM

                                       </option>
                                    @endfor

                                </select>

                            </div>
                        </div>
                    </td>
                </tr>
                    
              
              @endforeach

            </tbody>
          </table>
        </div>
        
</div>
</form>   
@endsection