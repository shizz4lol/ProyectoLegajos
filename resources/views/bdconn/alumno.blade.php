@extends ('layouts.app')
@section ('contenido')
  <div class="form-header">
        <div class="titulo-wrap">
            <div>
                <h2>Datos del alumno</h2>
            </div>
        </div>
        <button type="button" class="btn-volver" onclick="window.history.back()">
             Volver
        </button>
    </div>
  <div>
          <table class="tabla">
            <thead>
              <tr>
                <th id="thnombrealumno">Nombre completo</th>
                <th>DNI</th>
                <th>Fecha de nacimiento</th>
                <th>Curso</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Documentos cargados</th>
                <th>Familiares cargados</th>
                <th>Editar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td id="nombrea">{{ $alumno->apellido }}, {{ $alumno->nombre }} </td>
                <td>{{ $alumno->dni }}</td>
                <td>{{$alumno->fecha_nacimiento}}</td>
                <td>{{$alumno->curso->curso}} {{$alumno->division->division}}</td>
                <td>{{$alumno->telefono}}</td>
                <td>{{$alumno->email}}</td>
                <td>{{ $alumno->documentos->count() }}</td>
                <td>{{ $alumno->familiares->count() }}</td>
                <td>
                  <a href="{{route('legajos.edit', $alumno->id_alumno)}}">
                      <button class="accion-btn" title="Editar documento">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M12 20h9"></path>
                              <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                          </svg>
                      </button>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="legajo-vista">

  </div>
        
    <div class="legajo-contenedor">
        <div class="legajo-card">
        <h2>Familiares</h2>
        @forelse($alumno->familiares as $familiar)

                        <div class="resumen-item">
                            <div>

                                <p>
                                    {{ $familiar->nombre }}
                                    {{ $familiar->apellido }}
                                </p>

                                <small>
                                    {{ $familiar->parentezco }}
                                </small>

                            </div>

                        </div>

          @empty

                        <p class="sin-datos">
                            No hay familiares registrados.
                        </p>

          @endforelse
        </div>
        <div class="legajo-card documentacion">
          <h2>Documentos del alumno</h2>
          <table class="tabla">
              <thead>
                  <tr>
                      <th>N°</th>
                      <th>Nombre</th>
                      <th>Tipo</th>
                      <th>Año</th>
                      <th>Imagen</th>
                      <th>Acciones</th>
                  </tr>
              </thead>

              <tbody>
                  @foreach($alumno->documentos as $indice => $documento)
                      <tr>
                          <td class="col-numero">{{ $indice + 1 }}</td>
                          <td>{{ $documento->nombre }}</td>
                          <td>{{ $documento->tipo }}</td>
                          <td>{{ $documento->año }}</td>
                          <td >
                              <a href="{{ asset($documento->archivo_adj) }}" target="_blank"><img class="imagendocumento" src="{{ asset($documento->archivo_adj) }}" alt="{{ $documento->nombre }}"></a>
                          </td>
                          <td class="col-acciones">
                          <div class="acciones-grupo">
                            <a href="">
                                <button class="accion-btn" title="Editar documento">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                    </svg>
                                </button>
                            </a>
                            @if (session('rol') === 'secretaria')
                            <form action="{{ route('alumnos.documentos.destroy', [$alumno->id_alumno, $documento->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                              <button type="submit" class="accion-btn" title="Eliminar documento">
                                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <path d="M3 6h18"></path>
                                      <path d="M8 6V4h8v2"></path>
                                      <path d="M19 6l-1 14H6L5 6"></path>
                                      <path d="M10 11v5"></path>
                                      <path d="M14 11v5"></path>
                                  </svg>
                              </button>
                            </form>
                            @endif
                          </div>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
    </div></br>
        
    </div>
    <div class="botones-legajo">
        <a href="">
          <button type="button" class="btn-volver" >
            Cargar familiar
          </button>
        </a>
        <a href="{{route('creardocumento', $alumno->id_alumno)}}">
          <button type="button" class="btn-volver" >
            Cargar documento
          </button>
        </a>
    </div>
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