@extends('layouts.app')
@section('contenido')
<div class="login-wrap" id="registrar">

  <form action="{{ route('crearusuario') }}" method="POST" >

    @csrf
    <h2>Registro</h2>


    <div class="login-field">
      <label for="nombre">Ingrese nuevo nombre de usuario</label>
      <input
        type="text"
        placeholder="Nombre de usuario"
        id="nombre"
        name="nombre"
        autocomplete="off" required
      >

    </div>


    <div class="login-field password-field">
    <label for="password">Ingrese contraseña</label>
      <input
        type="password"
        id="password"
        placeholder="Ingrese su clave"
        name="password"
        autocomplete="off" required
      >
      <button
        type="button"
        id="mostrarPassword"
        class="btn-mostrar-password"
        aria-label="Mostrar contraseña"
      >

        <svg
          id="iconoPassword"
          xmlns="http://www.w3.org/2000/svg"
          width="18"
          height="18"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >

          <path
            d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"
          />

          <circle
            cx="12"
            cy="12"
            r="3"
          />

        </svg>

      </button>
    </div>
    <div class="login-field password-field">
    <label for="password_confirm">Confirme contraseña</label>
      <input
        type="password"
        id="password_confirm"
        placeholder="Confirme su clave"
        name="password_confirmation"
        autocomplete="off" required
      >
      <button
        type="button"
        id="mostrarPasswordConfirm"
        class="btn-mostrar-password"
        aria-label="Mostrar contraseña"
      >

        <svg
          id="iconoPasswordConfirm"
          xmlns="http://www.w3.org/2000/svg"
          width="18"
          height="18"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >

          <path
            d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"
          />

          <circle
            cx="12"
            cy="12"
            r="3"
          />

        </svg>

      </button>
    </div>
    <div class="login-field">
      <label for="nombre">Rol del usuario</label>
      <select id="rol" name="rol" required>
        <option value="" disabled selected>Seleccione rol...</option>
        <option value="secretaria">Secretaria</option>
        <option value="jefe">Jefe de Preceptores</option>
        <option value="preceptor">Preceptor</option>
      </select>

    </div>
    <input
      type="submit"
      class="login-btn"
      value="Cargar"
    >

  </form>


  <p id="error">{{ session('error') }}</p>

</div>
@include('layouts.mostrarcontraseña')
@endsection
