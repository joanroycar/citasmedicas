 <!-- Navigation -->

 <h6 class="navbar-heading text-muted">
  @if(auth()->user()->role == 'admin')

           Gestión


  @else
       Menu   
  @endif
          </h6>

 <ul class="navbar-nav">
  @if(auth()->user()->role == 'admin')

    <li class="nav-item  active ">
      <a class="nav-link  active " href="./index.html">
        <i class="ni ni-tv-2 text-danger"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="/especialidades">
        <i class="ni ni-briefcase-24 text-blue"></i> Especialidades
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="/medicos">
        <i class="fas fa-stethoscope text-info"></i> Medicos
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="/pacientes">
        <i class="fas fa-bed text-warning"></i> Pacientes
      </a>
    </li>

    @elseif(auth()->user()->role == 'doctor')
    <li class="nav-item">
      <a class="nav-link " href="/medicos/horarios">
        <i class="ni ni-calendar-grid-58 text-primary"></i> Gestionar Horario
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="">
        <i class="fas fa-clock text-info"></i> Mis citas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="/pacientes">
        <i class="fas fa-bed text-danger"></i> Mis pacientes
      </a>
    </li>
    @else
    <a class="nav-link " href="">
      <i class="ni ni-calendar-grid-58 text-primary"></i> Reservar Cita
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="">
      <i class="fas fa-clock text-info"></i> Mis citas
    </a>
  </li>
 
    @endif
    <li class="nav-item">
      <a class="nav-link" href="{{route('logout')}}"
     onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
        <i class="fas fa-sign-in-alt text-pink"></i> Cerrar Sesión
      </a>
      <form action="{{route('logout')}}" method="POST" style="display: : none;" id="formLogout">
    @csrf
    </form>
    </li>
  </ul>
  <!-- Divider -->
  @if(auth()->user()->role == 'admin')

  <hr class="my-3">
  <!-- Heading -->
  <h6 class="navbar-heading text-muted">Reportes</h6>
  <!-- Navigation -->
  <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="ni ni-books text-default"></i> Citas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="ni ni-chart-bar-32 text-warning"></i> Desempeño Medico
      </a>
    </li>
    
  </ul>

  
  @endif