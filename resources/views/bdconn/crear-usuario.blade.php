@extends('layouts.app')

@section('contenido')

<div class="form-header">

    <div class="titulo-wrap">
        <div class="icono-cuadrado">
            <i class="fa-solid fa-user-plus"></i>
        </div>

        <div>
            <h2>Crear nuevo usuario</h2>
            <p>
                Complete los datos correspondientes para registrar un nuevo usuario.
            </p>

            <p id="aviso">{{ session('aviso') }}</p>
        </div>
    </div>

    <button
        type="button"
        class="btn-volver"
        onclick="window.history.back()">
        Volver
    </button>

</div>


<form
    action="{{ route('usuarios.store') }}"
    method="POST"
    id="crearUsuario"
    autocomplete="off">

    @csrf


    <div class="legajo-card">

        <h2>Datos del usuario</h2>


        <div class="legajo-card-top">

            <div class="avatar-generico">
                <i class="fa-solid fa-user"></i>
            </div>


            <div class="nombre-wrap">

                <label for="nombre">
                    Nombre
                    <span class="req">*</span>
                </label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="input-nombre"
                    placeholder="Ingrese el nombre"
                    required
                >


                <label for="apellido">
                    Apellido
                    <span class="req">*</span>
                </label>

                <input
                    type="text"
                    id="apellido"
                    name="apellido"
                    class="input-nombre"
                    placeholder="Ingrese el apellido"
                    required
                >

            </div>

        </div>


        <div class="campo-icono-form">

            <span class="ic">
                <i class="fa-solid fa-user"></i>
            </span>

            <label for="usuario">
                Nombre de usuario
                <span class="req">*</span>
            </label>

            <input
                type="text"
                id="usuario"
                name="usuario"
                placeholder="Ej: juan.perez"
                required
            >

        </div>


        <div class="campo-icono-form">

            <span class="ic">
                <i class="fa-solid fa-envelope"></i>
            </span>

            <label for="email">
                Email
                <span class="req">*</span>
            </label>

            <input
                type="email"
                id="email"
                name="email"
                placeholder="Ej: usuario@example.com"
                required
            >

        </div>


        <div class="campo-icono-form">

            <span class="ic">
                <i class="fa-solid fa-user-shield"></i>
            </span>

            <label for="rol">
                Rol
                <span class="req">*</span>
            </label>

            <select
                id="rol"
                name="rol"
                required>

                <option value="" disabled selected>
                    Seleccione un rol...
                </option>

                <option value="secretaria">
                    Secretaría
                </option>

                <option value="jefe_preceptores">
                    Jefe de Preceptores
                </option>

                <option value="preceptor">
                    Preceptor
                </option>

            </select>

        </div>

    </div>


    <div class="legajo-card">

        <h2>Contraseña</h2>


        <div class="campo-icono-form">

            <span class="ic">
                <i class="fa-solid fa-lock"></i>
            </span>

            <label for="password">
                Contraseña
                <span class="req">*</span>
            </label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Ingrese una contraseña"
                required
            >

        </div>


        <div class="campo-icono-form">

            <span class="ic">
                <i class="fa-solid fa-lock"></i>
            </span>

            <label for="password_confirmation">
                Confirmar contraseña
                <span class="req">*</span>
            </label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Repita la contraseña"
                required
            >

        </div>


        <p class="form-hint">
            La contraseña debe coincidir en ambos campos.
        </p>

    </div>

    <div class="acciones">

        <button
            type="submit"
            class="btn-guardar-legajo">

            <i class="fa-solid fa-floppy-disk"></i>
            Crear usuario

        </button>

    </div>


</form>

@endsection