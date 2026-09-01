@extends ('layouts.app')
@section ('contenido')
<div class="contenido">

    <div class="legajo-vista">

        <!-- ENCABEZADO -->
        <div class="legajo-header">

            <div class="legajo-titulo">

                <div class="legajo-icono">
                    🎓
                </div>

                <div>
                    <h1>Legajo del Alumno</h1>
                    <p>Información completa del alumno</p>
                </div>

            </div>

            <button type="button"
                    class="btn-volver-lista"
                    onclick="window.history.back()">
                ← Volver a la lista
            </button>

        </div>
        <div class="legajo-secciones">


            <div class="legajo-card seccion-alumno">

                <div class="seccion-card-header">

                    <div class="seccion-icono azul">
                        👤
                    </div>

                    <div>
                        <h2>Datos del alumno</h2>
                        <p>Información personal y de contacto</p>
                    </div>

                </div>


                <div class="datos-alumno-grid">

                    <div class="dato-alumno">
                        <span class="icono">👤</span>
                        <span>
                            <strong>Nombre:</strong>
                            {{$alumno->nombre}} {{$alumno->apellido}}
                        </span>
                    </div>


                    <div class="dato-alumno">
                        <span class="icono">▣</span>
                        <span>
                            <strong>DNI:</strong>
                            {{$alumno->dni}}
                        </span>
                    </div>


                    <div class="dato-alumno">
                        <span class="icono">🎓</span>
                        <span>
                            <strong>Curso:</strong>
                            {{$alumno->curso->curso}}
                            {{$alumno->division->division}}
                        </span>
                    </div>


                    <div class="dato-alumno">
                        <span class="icono">📅</span>
                        <span>
                            <strong>Fecha de nacimiento:</strong>
                            {{$alumno->fecha_nacimiento}}
                        </span>
                    </div>


                    <div class="dato-alumno">
                        <span class="icono">📞</span>
                        <span>
                            <strong>Teléfono:</strong>
                            {{$alumno->telefono}}
                        </span>
                    </div>


                    <div class="dato-alumno">
                        <span class="icono">✉</span>
                        <span>
                            <strong>Email:</strong>
                            {{$alumno->email}}
                        </span>
                    </div>

                </div>

            </div>


            <div class="legajo-card">

                <div class="seccion-card-header">

                    <div class="seccion-icono verde">
                        👨‍👩‍👧
                    </div>

                    <div>

                        <h2>Familiares</h2>

                        <p>
                            Familiares registrados:
                            <strong>
                                {{ $alumno->familiares->count() }}
                            </strong>
                        </p>

                    </div>

                </div>


                <div class="lista-resumen">

                    @forelse($alumno->familiares as $familiar)

                        <div class="resumen-item">

                            <span class="resumen-icono">
                                👤
                            </span>

                            <div>

                                <strong>
                                    {{ $familiar->nombre }}
                                    {{ $familiar->apellido }}
                                </strong>

                                <small>
                                    {{ $familiar->parentesco }}
                                </small>

                            </div>

                        </div>

                    @empty

                        <p class="sin-datos">
                            No hay familiares registrados.
                        </p>

                    @endforelse

                </div>


                <a href="#" class="btn-seccion verde-btn">
                    👨‍👩‍👧 Ver familiares
                </a>

            </div>



            <div class="legajo-card">

                <div class="seccion-card-header">

                    <div class="seccion-icono naranja">
                        📄
                    </div>

                    <div>

                        <h2>Documentos</h2>

                        <p>
                            Documentos entregados:
                            <strong>
                                {{ $alumno->documentos->count() }}
                            </strong>
                        </p>

                    </div>

                </div>


                <div class="lista-resumen">

                    @forelse($alumno->documentos as $documento)

                        <div class="resumen-item">

                            <span class="documento-check">
                                ✓
                            </span>

                            <div>

                                <strong>
                                    {{ $documento->nombre }}
                                </strong>

                            </div>

                        </div>

                    @empty

                        <p class="sin-datos">
                            No hay documentos registrados.
                        </p>

                    @endforelse

                </div>


                <a href="#" class="btn-seccion naranja-btn">
                    📄 Ver documentos
                </a>

            </div>


        </div>

        <div class="acciones-legajo">

            <button type="button" class="btn-editar">
                ✎ Editar
            </button>

        </div>

    </div>

</div>

</div>
@endsection