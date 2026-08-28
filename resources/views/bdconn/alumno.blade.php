@extends ('layouts.app')
@section ('contenido')
  <div class="contenido">
        <button type="button" class="btn-volver" onclick="window.history.back()">
             Volver
        </button>
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
@endsection