<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>LEGAJOS - Modificar familiar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

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

        <span>
            Sistema de Gestión de Legajos
        </span>

    </div>

</header>


<div class="layout">

    <div class="sidebar" id="sidebar">

        <div>

            <div class="item">

                <span class="ic">
                    <img src="/imagen/casita.png">
                </span>

                <span class="label">
                    <a href="{{ route('inicio') }}">
                        Inicio
                    </a>
                </span>

            </div>

            <div class="item">

                <span class="ic">
                    <img src="/imagen/hoja.png">
                </span>

                <span class="label">
                    <a href="">
                        Cursos
                    </a>
                </span>

            </div>

        </div>

    </div>


    <main class="contenido">

        <div class="titulo">

            <h1>Modificar familiar</h1>

            <p>
                Modifique los datos del familiar.
            </p>

        </div>


        <form action="{{ route('familiar.update', $familiar->id) }}"
              method="POST">

            @csrf
            @method('PUT')


            <div class="tarjeta">

                <h2>Datos del familiar</h2>


                <div class="form-grid">


                    <div class="campo">

                        <label for="nombre">
                            Nombre
                        </label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre', $familiar->nombre) }}"
                            required>

                    </div>


                    <div class="campo">

                        <label for="apellido">
                            Apellido
                        </label>

                        <input
                            type="text"
                            id="apellido"
                            name="apellido"
                            value="{{ old('apellido', $familiar->apellido) }}"
                            required>

                    </div>


                    <div class="campo">

                        <label for="dni">
                            DNI
                        </label>

                        <input
                            type="text"
                            id="dni"
                            name="dni"
                            value="{{ old('dni', $familiar->dni) }}">

                    </div>


                    <div class="campo">

                        <label for="parentesco">
                            Parentesco
                        </label>

                        <select
                            id="parentesco"
                            name="parentesco"
                            required>

                            <option value="Padre"
                                {{ $familiar->parentesco == 'Padre' ? 'selected' : '' }}>
                                Padre
                            </option>

                            <option value="Madre"
                                {{ $familiar->parentesco == 'Madre' ? 'selected' : '' }}>
                                Madre
                            </option>

                            <option value="Tutor"
                                {{ $familiar->parentesco == 'Tutor' ? 'selected' : '' }}>
                                Tutor
                            </option>

                            <option value="Hermano"
                                {{ $familiar->parentesco == 'Hermano' ? 'selected' : '' }}>
                                Hermano/a
                            </option>

                            <option value="Otro"
                                {{ $familiar->parentesco == 'Otro' ? 'selected' : '' }}>
                                Otro
                            </option>

                        </select>

                    </div>


                    <div class="campo">

                        <label for="telefono">
                            Teléfono
                        </label>

                        <input
                            type="text"
                            id="telefono"
                            name="telefono"
                            value="{{ old('telefono', $familiar->telefono) }}">

                    </div>


                    <div class="campo">

                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $familiar->email) }}">

                    </div>


                    <div class="campo">

                        <label for="direccion">
                            Dirección
                        </label>

                        <input
                            type="text"
                            id="direccion"
                            name="direccion"
                            value="{{ old('direccion', $familiar->direccion) }}">

                    </div>


                </div>

            </div>


            <div class="acciones">

                <button
                    type="button"
                    class="btn-volver"
                    onclick="window.history.back()">

                    Cancelar

                </button>


                <button
                    type="submit"
                    class="btn-guardar">

                    Guardar cambios

                </button>

            </div>


        </form>

    </main>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>