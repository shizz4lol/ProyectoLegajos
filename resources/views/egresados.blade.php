@extends('layouts.app')
@section ('contenido')

        <div class="egresados-vista">
            <div class="egresados-header">

                <div>

                        <div class="item ">
                            <span class="ic"><img src="/imagen/gorro.png" alt="Alumnos"></span>
                            <span class="label"></span>
                       </div>

                    <p>
                        Consulta los legajos de alumnos que finalizaron sus estudios.
                    </p>

                </div>


                <button
                    class="btn-volver-lista"
                    onclick="window.history.back()">

                    ← Volver

                </button>

            </div>

            <div class="años-egresados">

               <!--  forelse($egresados->groupBy('año_egreso') as año => $alumnos) -->

                    <div class="año-egresado">


                        <div
                            class="año-egresado-header"
                            onclick="toggleAño(this)">

                            <div class="año-info">

                                <div class="año-icono">
                                </div>

                                <div>

                                    <h2>
                                        año
                                    </h2>

                                    <span>
                                        cantidad e
                                    </span>

                                </div>

                            </div>


                            <span class="flecha-año">
                                +
                            </span>

                        </div>


                        <div class="lista-egresados">



                                <div class="egresado-item">

                                    <div class="egresado-numero">
                                       loop.>iteration
                                    </div>


                                    <div class="egresado-avatar">
                                        <span class="ic"><img src="../imagen/usuario.png" alt="Alumnos"></span>
                                    <span class="label"></span>
                                    </div>
                                    


                                    <div class="egresado-datos">

                                        <!-- <strong>
                                            datos nombre etc
                                        </strong>

                                        <span>
                                            DNI:
                                            
                                        </span> -->

                                    </div>


                                    <a
                                        href="#"
                                        class="btn-ver-egresado">

                                        Ver legajo →

                                    </a>

                                </div>



                        </div>

                    </div>

                <!-- empty

                    <div class="sin-egresados">

                        <span><img src="../imagen/gorro.png" alt="Alumnos"></span>

                        <h3>
                            No hay egresados registrados
                        </h3>

                        <p>
                            Todavía no existen legajos de egresados.
                        </p>

                    </div>

                endforelse -->

            </div>

        </div>

@endsection
@section ('script')
<script>
    function toggleAño(elemento) {

        const tarjeta = elemento.parentElement;

        tarjeta.classList.toggle("abierto");

    }
</script>
@endsection