@extends('layouts.app')
@section ('contenido')


        <div class="titulo">

            <h1>Modificar alumno</h1>

            <p>
                Modifique los datos del alumno seleccionado.
            </p>

        </div>


        <!-- FORMULARIO -->

        <form action="{{ route('legajos.update', ['legajo' => $alumno->id_alumno]) }}" method="POST">

            @csrf
            @method('PUT')

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
                            maxlength="8"
                            value="{{ old('dni', $alumno->dni) }}"
                            required
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">

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
@endsection
