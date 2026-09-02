@extends('layouts.app')
@section ('contenido')

        <div class="archivados-vista">


            <div class="archivados-header">

                <div>

                    <h1>
                        Legajos Archivados
                    </h1>

                    <p>
                        Consulta los legajos que fueron archivados.
                    </p>

                </div>


                <button
                    class="btn-volver-lista"
                    onclick="window.history.back()">

                    ← Volver

                </button>

            </div>


            <!-- LISTA -->

            <div class="lista-archivados">

                    <div class="archivado-card">


                        <div class="archivado-avatar">
                            <img src="../imagen/usuario.png" alt="Alumnos">
                        </div>


                        <div class="archivado-info">

                            <div class="archivado-nombre">

                                <h2>
                                    nombre
                                </h2>

                                <span class="badge-archivado">
                                    ARCHIVADO
                                </span>

                            </div>


                            <div class="archivado-datos">

                                <span>
                                    <strong>DNI:</strong>
                                    dni
                                </span>

                                <span>
                                    <strong>Curso:</strong>
                                    
                                </span>

                                <span>
                                    <strong>Fecha de archivo:</strong>
                                </span>

                            </div>

                        </div>


                        <a
                            href="#"
                            class="btn-ver-archivado">

                            Ver legajo →

                        </a>


                    </div>

         

                    <div class="sin-archivados">

                        <span>📦</span>

                        <h3>
                            No hay legajos archivados
                        </h3>

                        <p>
                            No existen alumnos archivados actualmente.
                        </p>

                    </div>


            </div>

        </div>
@endsection