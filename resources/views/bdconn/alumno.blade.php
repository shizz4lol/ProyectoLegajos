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
  <div class="tabla-contenedor">
          <table class="tabla">
            <thead>
              <tr>
                <th id="thnombrealumno">Nombre completo</th>
                <th>DNI</th>
                <th>Fecha de nacimiento</th>
                <th id="thcurso">
                  Curso
                @if (session('rol')==='secretaria' || session('rol')==='jefe')
                <a href="{{route('editarcurso', ['alumno' => $alumno->id_alumno])}}">
                      <button class="accion-btn" title="Editar curso">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M12 20h9"></path>
                              <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                          </svg>
                      </button>
                  </a>
                @endif
                </th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Documentos cargados</th>
                <th>Familiares cargados</th>
                <th>Acciones</th>
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
                  @if (session('rol')==='secretaria' || session('rol')==='jefe')
                  <a href="{{route('legajos.edit', $alumno->id_alumno)}}">
                      <button class="accion-btn" title="Editar alumno">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M12 20h9"></path>
                              <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                          </svg>
                      </button>
                  </a>
                  @endif
                    <button class="accion-btn" title="Descargar legajo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                    </button>
                </td>
              </tr>
            </tbody>
          </table>
  </div>
        
    <div class="legajo-contenedor">
    <div class="legajo-card">
        <h2>Familiares</h2>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Familiar</th>
                    <th>DNI</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumno->familiares as $familiar)
                    <tr class="fila-familiar" data-id="{{ $familiar->id }}">
                        <td>
                            {{ $familiar->nombre }} {{ $familiar->apellido }}
                            <br>
                            <small>{{ $familiar->parentesco }}</small>
                        </td>

                        <td>
                            {{ $familiar->dni }}
                        </td>

                        <td class="col-acciones">
                            <div class="acciones-grupo">
                                <a href="{{ route('editarfamiliar', ['alumno' => $alumno->id_alumno, 'familiar' => $familiar->id]) }}">
                                    <button type="button" class="accion-btn" title="Editar familiar">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                        </svg>
                                    </button>
                                </a>

                                {{-- Eliminar --}}
                                @if (session('rol') === 'secretaria')
                                    <form action="{{ route('alumnos.familiares.destroy', ['alumno' => $alumno->id_alumno, 'familiar' => $familiar->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="accion-btn" title="Eliminar familiar">
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
                            <a href="{{route ('editardocumento', ['alumno' => $alumno->id_alumno, 'documento' => $documento->id])}}">
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
        <a href="{{route('crearfamiliar', $alumno->id_alumno)}}">
          <button type="button" class="btn-volver" >
            Cargar Familiar
          </button>
        </a>
        <a href="{{route('creardocumento', $alumno->id_alumno)}}">
          <button type="button" class="btn-volver" >
            Cargar documento
          </button>
        </a>
    </div></br>

    <div class="tabla-contenedor" id="tablafamiliar" style="display: none;">
          <table class="tabla">
            <thead id="encabezado-familiar">
            </thead>
            <tbody id="datos-familiar">
            </tbody>
          </table><br>

          <button type="button" class="btn-volver" id="cerrar-detalle">
            Cerrar detalle
          </button>
    </div></br>


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
@section ('script')
<script>

const familiares = @json($alumno->familiares);

const filasFamiliares = document.querySelectorAll('.fila-familiar');
const tablaFamiliar = document.getElementById('tablafamiliar');
const encabezadoFamiliar = document.getElementById('encabezado-familiar');
const datosFamiliar = document.getElementById('datos-familiar');
const cerrarDetalle = document.getElementById('cerrar-detalle');


filasFamiliares.forEach(fila => {

    fila.addEventListener('click', function(event) {

        // Si se hizo click en los botones de acciones,
        // no se abre el detalle.
        if (event.target.closest('.col-acciones')) {
            return;
        }


        const id = this.dataset.id;

        const familiar = familiares.find(f => f.id == id);


        if (!familiar) {
            return;
        }


        encabezadoFamiliar.innerHTML = '';
        datosFamiliar.innerHTML = '';


        const filaEncabezado = document.createElement('tr');
        const filaDatos = document.createElement('tr');


        // Nombre completo
        const thNombre = document.createElement('th');
        thNombre.textContent = 'Nombre completo';

        const tdNombre = document.createElement('td');
        tdNombre.textContent = familiar.nombre + ' ' + familiar.apellido;


        filaEncabezado.appendChild(thNombre);
        filaDatos.appendChild(tdNombre);


        // DNI
        const thDni = document.createElement('th');
        thDni.textContent = 'DNI';

        const tdDni = document.createElement('td');
        tdDni.textContent = familiar.dni ?? '';


        filaEncabezado.appendChild(thDni);
        filaDatos.appendChild(tdDni);


        // Resto de atributos
        Object.entries(familiar).forEach(([atributo, valor]) => {

        if (
          atributo === 'id' ||
          atributo === 'nombre' ||
          atributo === 'apellido' ||
          atributo === 'dni' ||
          atributo === 'created_at' ||
          atributo === 'updated_at' ||
          atributo === 'pivot'
        ) {
          return;
        }


            const th = document.createElement('th');
            const td = document.createElement('td');


            if (atributo === 'fecha_nacimiento') {
                th.textContent = 'Fecha de nacimiento';
            } else if (atributo === 'telefono') {
                th.textContent = 'Telefono';
            } else if (atributo === 'domicilio') {
                th.textContent = 'Domicilio';
            } else if (atributo === 'email') {
                th.textContent = 'Email';
            } else if (atributo === 'parentezco') {
                th.textContent = 'Parentesco';
            } else {
                th.textContent = atributo;
            }


            td.textContent = valor ?? '';


            filaEncabezado.appendChild(th);
            filaDatos.appendChild(td);

        });


        encabezadoFamiliar.appendChild(filaEncabezado);
        datosFamiliar.appendChild(filaDatos);


        tablaFamiliar.style.display = 'block';

    });

});


cerrarDetalle.addEventListener('click', function() {

    tablaFamiliar.style.display = 'none';

    encabezadoFamiliar.innerHTML = '';
    datosFamiliar.innerHTML = '';

});

</script>
@endsection