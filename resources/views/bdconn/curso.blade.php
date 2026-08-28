@extends ('layouts.app')
@section ('contenido') 
    <div class="curso-header">
      <div class="curso-header-left">
        <div class="icono-circular">
          <!-- Ícono de personas (SVG), se recolorea solo con "color: ..." en CSS gracias a stroke="currentColor" -->
          <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </div>
        <div>
          <h2>Curso: {{$curso->curso}} {{$division->division}}</h2>
          <p>Listado de alumnos</p>
        </div>
      </div>

      <div class="buscador" id="buscador-curso">
          <form action="{{route('buscar')}}" method="post" >
            <input type="hidden" name="id_curso" value="{{ $curso->id}}">
            <input type="hidden" name="id_division" value="{{ $division->id }}">
            <input type="text"  placeholder="Buscar alumno de este curso..."name="buscador" autocomplete="off">
            <button class="lupa" type="submit">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
              </button>
          </form>
      </div>
</div>

    <table class="tabla-curso">
      <thead>
        <tr>
          <th>N°</th>
          <th>Alumno</th>
          <th>DNI</th>
          <th>Acciones</th>
        </tr>
      </thead>
<div class="tabla-contenedor">
    <table>
        <!-- Aquí van tus <th> con los títulos de la tabla -->
        <tbody>
            @foreach ($alumnos as $indice => $alumno)
                <tr>
                    <td class="col-numero">{{ $indice + 1 }}</td>

                    <td>
                        {{ $alumno->apellido }}, {{ $alumno->nombre }}
                    </td>

                    <td>
                        {{ $alumno->dni }}
                    </td>

                    <td class="col-acciones">
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
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg>
                            </button>

                            <button class="accion-btn" title="Descargar legajo">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </table>

  </div>
@endsection
