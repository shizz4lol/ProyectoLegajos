<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>LEGAJOS - EPET N°20 - Modificar Documento</title>

    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
</head>

<body>

<header class="topbar">

    <button class="ham-btn" id="btnMenu">
        &#9776;
    </button>

    <div class="logo">

        <div id="escudo">
            <img src="/imagen/epet.png" alt="Escudo EPET 20">
        </div>

        <div class="txt">
            <b>LEGAJOS</b>
            <span>EPET N°20</span>
        </div>

    </div>

    <div class="bienvenida-top">
        <b>¡Bienvenido/a!</b>
        <span>Sistema de Gestión de Legajos</span>
    </div>

    <div class="userchip">

        <div class="av">
            {{ strtoupper(substr(Auth::user()->nombre, 0, 1)) }}
        </div>

        <div class="txt">
            <span>Usuario</span>
        </div>

    </div>

</header>


<div class="layout">


    <div class="sidebar" id="sidebar">

        <div>

            <div class="item">
                <span class="ic">
                    <img src="/imagen/casita.png" alt="Inicio">
                </span>

                <span class="label">
                    <a href="{{ route(session('rol') === 'preceptor' ? 'inicio3' : 'inicio') }}">
                        Inicio
                    </a>
                </span>
            </div>


            <div class="item">
                <span class="ic">
                    <img src="/imagen/hoja.png" alt="Cursos">
                </span>

                <span class="label">
                    Cursos
                </span>
            </div>

        </div>

    </div>


    <main class="contenido">

        <div class="titulo">

            <h1>Modificar documento</h1>

            <p>
                Modifique los datos del documento del legajo.
            </p>

        </div>


        <form action="{{ route('modificarDocumento', $documento->id) }}" method="POST">

            @csrf
            @method('PUT')


            <div class="tarjeta">

                <h2>Datos del documento</h2>


                <div class="form-grid">


                    <div class="campo">

                        <label for="tipo">
                            Tipo de documento
                        </label>

                        <select name="tipo" id="tipo" required>

                            <option value="">
                                Seleccione un documento
                            </option>

                            <option value="DNI"
                                {{ $documento->tipo == 'DNI' ? 'selected' : '' }}>
                                DNI
                            </option>

                            <option value="Partida de nacimiento"
                                {{ $documento->tipo == 'Partida de nacimiento' ? 'selected' : '' }}>
                                Partida de nacimiento
                            </option>

                            <option value="Certificado de alumno regular"
                                {{ $documento->tipo == 'Certificado de alumno regular' ? 'selected' : '' }}>
                                Certificado de alumno regular
                            </option>

                            <option value="Certificado médico"
                                {{ $documento->tipo == 'Certificado médico' ? 'selected' : '' }}>
                                Certificado médico
                            </option>

                            <option value="Otro"
                                {{ $documento->tipo == 'Otro' ? 'selected' : '' }}>
                                Otro
                            </option>

                        </select>

                    </div>


                    <div class="campo">

                        <label for="estado">
                            Estado del documento
                        </label>

                        <select name="estado" id="estado" required>

                            <option value="Presentado"
                                {{ $documento->estado == 'Presentado' ? 'selected' : '' }}>
                                Presentado
                            </option>

                            <option value="Pendiente"
                                {{ $documento->estado == 'Pendiente' ? 'selected' : '' }}>
                                Pendiente
                            </option>

                            <option value="Vencido"
                                {{ $documento->estado == 'Vencido' ? 'selected' : '' }}>
                                Vencido
                            </option>

                        </select>

                    </div>


                </div>



                <div class="campo">

                    <label for="observaciones">
                        Observaciones
                    </label>

                    <textarea
                        name="observaciones"
                        id="observaciones"
                        placeholder="Escriba alguna observación..."
                    >{{ $documento->observaciones }}</textarea>

                </div>


            </div>


            <div class="acciones">

                <button
                    type="button"
                    class="btn-volver"
                    onclick="window.history.back()"
                >
                    Cancelar
                </button>


                <button
                    type="submit"
                    class="btn-guardar"
                >
                    Guardar cambios
                </button>

            </div>


        </form>

    </main>

</div>

</body>
</html>