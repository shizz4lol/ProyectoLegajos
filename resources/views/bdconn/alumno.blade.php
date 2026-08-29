@extends ('layouts.app')
@section ('contenido')
  <div class="contenido">
        <button type="button" class="btn-volver" onclick="window.history.back()">
             Volver
        </button>
        <a href="{{route('creardocumento')}}">
          <button type="button" class="btn-volver" >
            Crear documento
          </button>
        </a>
      <section>
          <h2>Datos del alumno</h2>

          <label for="nombre">Nombre y apellido</label>
          <p id="nombre">{{$alumno->nombre}} {{$alumno->apellido}}</p>

          <label for="dni">DNI</label>
          <p id="dni">{{$alumno->dni}}</p>

          <label for="curso">Curso</label>
          <p id="curso">{{$alumno->curso->curso}} {{$alumno->division->division}}</p>

          <label for="fecha">Fecha de nacimiento</label>
          <p id="">{{$alumno->fecha_nacimiento}}</p>

          <label for="telefono">Teléfono</label>
          <p id="">{{$alumno->telefono}}</p>

          <label for="email">Email</label>
          <p id="">{{$alumno->email}}</p>
      </section>
        <button type="submit" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar</button>
<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" >¿Desea continuar?</h1>
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M10.3 3.3L2.2 17.5A2 2 0 0 0 4 20.5h16a2 2 0 0 0 1.8-3L13.7 3.3a2 2 0 0 0-3.4 0z"></path>
            <line x1="12" y1="9" x2="12" y2="13"></line>
            <circle cx="12" cy="16" r="0.8"></circle>
        </svg>
        <button type="button" class="btn-close" id="eliminar" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>Esto sera definitivo, y se perderan todos los datos personales y/o archivos relacionados con este alumno</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="{{route('legajos.destroy', $alumno->id_alumno)}}" method="POST">
        @csrf
        @method('DELETE')
            <button type="submit" class="btn btn-primary">ELIMINAR</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection