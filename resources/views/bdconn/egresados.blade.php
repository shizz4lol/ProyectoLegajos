@extendes('layouts.app')
    <main class="contenido">

        <div class="egresados-vista">
            <div class="egresados-header">

                <div>

                    <h1>
                        🎓 Legajos Egresados
                    </h1>

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

                @forelse($egresados->groupBy('año_egreso') as $año => $alumnos)

                    <div class="año-egresado">


                        <div
                            class="año-egresado-header"
                            onclick="toggleAño(this)">

                            <div class="año-info">

                                <div class="año-icono">
                                    📅
                                </div>

                                <div>

                                    <h2>
                                        {{ $año }}
                                    </h2>

                                    <span>
                                        {{ $alumnos->count() }}
                                        egresados
                                    </span>

                                </div>

                            </div>


                            <span class="flecha-año">
                                +
                            </span>

                        </div>


                        <div class="lista-egresados">


                            @foreach($alumnos as $alumno)

                                <div class="egresado-item">

                                    <div class="egresado-numero">
                                        {{ $loop->iteration }}
                                    </div>


                                    <div class="egresado-avatar">
                                        👤
                                    </div>


                                    <div class="egresado-datos">

                                        <strong>
                                            {{ $alumno->nombre }}
                                            {{ $alumno->apellido }}
                                        </strong>

                                        <span>
                                            DNI:
                                            {{ $alumno->dni }}
                                        </span>

                                    </div>


                                    <a
                                        href="#"
                                        class="btn-ver-egresado">

                                        Ver legajo →

                                    </a>

                                </div>

                            @endforeach


                        </div>

                    </div>

                @empty

                    <div class="sin-egresados">

                        <span>🎓</span>

                        <h3>
                            No hay egresados registrados
                        </h3>

                        <p>
                            Todavía no existen legajos de egresados.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </main>

</div>


<script>

function toggleAño(elemento) {

    const tarjeta = elemento.parentElement;

    tarjeta.classList.toggle("abierto");

}

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>