@extends('layouts.app')
@section ('contenido')
    <!-- CONTENIDO -->
    <main class="contenido">

        <div class="titulo">

            <h1>Modificar alumno</h1>

            <p>
                Modifique los datos del alumno seleccionado.
            </p>

        </div>


        <!-- FORMULARIO -->

        <form action="{{ route('alumno.update', $alumno->id) }}"
              method="POST">

            @csrf
            @method('PUT')


            <!-- DATOS DEL ALUMNO -->

            <div class="tarjeta">

                <h2>Datos personales</h2>

                <div class="form-grid">


                    <div class="campo">

                        <label for="nombre">
                            Nombre
                        </label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre', $alumno->nombre) }}"
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
                            value="{{ old('apellido', $alumno->apellido) }}"
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
                            value="{{ old('dni', $alumno->dni) }}"
                            required>

                    </div>


                    <div class="campo">

                        <label for="fecha_nacimiento">
                            Fecha de nacimiento
                        </label>

                        <input
                            type="date"
                            id="fecha_nacimiento"
                            name="fecha_nacimiento"
                            value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}"
                            required>

                    </div>


                    <div class="campo">

                        <label for="telefono">
                            Teléfono
                        </label>

                        <input
                            type="text"
                            id="telefono"
                            name="telefono"
                            value="{{ old('telefono', $alumno->telefono) }}">

                    </div>


                    <div class="campo">

                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $alumno->email) }}">

                    </div>


                    <!-- CURSO -->

                    <div class="campo">

                        <label for="curso">
                            Curso
                        </label>

                        <select id="curso" name="curso_id" required>

                            @foreach($cursos as $curso)

                                <option value="{{ $curso->id }}"
                                    {{ $alumno->curso_id == $curso->id ? 'selected' : '' }}>

                                    {{ $curso->curso }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- DIVISIÓN -->

                    <div class="campo">

                        <label for="division">
                            División
                        </label>

                        <select id="division" name="division_id" required>

                            @foreach($divisiones as $division)

                                <option value="{{ $division->id }}"
                                    {{ $alumno->division_id == $division->id ? 'selected' : '' }}>

                                    {{ $division->division }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                </div>

            </div>


            <!-- OBSERVACIONES -->

            <div class="tarjeta">

                <h2>Observaciones</h2>

                <div class="campo">

                    <label for="observaciones">
                        Observaciones del alumno
                    </label>

                    <textarea
                        id="observaciones"
                        name="observaciones"
                        placeholder="Ingrese alguna observación...">{{ old('observaciones', $alumno->observaciones ?? '') }}</textarea>

                </div>

            </div>


            <!-- BOTONES -->

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
@endsection
