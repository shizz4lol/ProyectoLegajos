@extends ('layouts.app')
@section ('contenido')   
  <div class="curso-header">
    <div class="curso-header-left">
      <div>
        <h2>Resultado de busqueda</h2>
        <p>Listado de alumnos</p>
      </div>
    </div>
  </div>
  @if ($resultados->isEmpty())
  <h2>No hay coincidencias</h2>
  @else
    <table class="tabla-curso">
      <thead>
        <tr>
          <th>N°</th>
          <th>Alumno</th>
          <th>DNI</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($resultados as $indice => $alumno)
        <tr>
          <td class="col-numero">{{ $indice + 1 }}</td>

          <td>{{ $alumno->apellido }}, {{ $alumno->nombre }}</td>

          <td>{{ $alumno->dni }}</td>
          <td>
              <a href="{{ route('alumnos', $alumno) }}">
                      <button class="accion-btn" title="Ver legajo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
              </a>
          </td>
            <!-- <td class="col-acciones">
                <div class="acciones-grupo">

                    
                    <a href="{{ route('alumnos', $alumno) }}">
                      <button class="accion-btn" title="Ver legajo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                    </a>
                        

                    <button class="accion-btn" title="Editar legajo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                        </svg>
                    </button>

                    <button class="accion-btn" title="Descargar legajo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                    </button>

                </div>
            </td> -->
        </tr>
    @endforeach
  @endif
</tbody>
    </table>

  </div>
@endsection
