@extends('layouts.app')
@section ('contenido')
        <div class="titulo">

            <h1>Modificar familiar</h1>

            <p>
                Modifique los datos del familiar.
            </p>

        </div>


        <form action="{{ route('alumnos.familiares.update', ['alumno' => $alumno->id_alumno, 'familiar' => $familiar->id])}}" method="POST">
            @csrf
            @method('PUT')

            <div class="tarjeta">

                <h2>Datos del familiar</h2>


                <div class="form-grid">


                    <div class="campo">
                        <label for="nombre">Nombre</label>

                        <input type="text" id="nombre" name="nombre" 
                        value="{{ old('nombre', $familiar->nombre) }}"required>

                    </div>


                    <div class="campo">

                        <label for="apellido">Apellido</label>

                        <input type="text" id="apellido" name="apellido"
                            value="{{ old('apellido', $familiar->apellido) }}" required>
                    </div>


                    <div class="campo">

                        <label for="dni">DNI</label>

                        <input
                            type="text"
                            id="dni"
                            name="dni"
                            value="{{ old('dni', $familiar->dni) }}">

                    </div>


                    <div class="campo">

                        <label for="parentesco">Parentesco</label>
                        <input
                            type="text"
                            id="parentesco"
                            name="parentesco"
                            value="{{ old('parentesco', $familiar->parentesco) }}">
                    </div>


                    <div class="campo">

                        <label for="telefono">Teléfono</label>

                        <input
                            type="text"
                            id="telefono"
                            name="telefono"
                            value="{{ old('telefono', $familiar->telefono) }}">

                    </div>


                    <div class="campo">

                        <label for="email">Email</label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $familiar->email) }}">

                    </div>


                    <div class="campo">

                        <label for="direccion">Domicilio</label>

                        <input
                            type="text"
                            id="direccion"
                            name="direccion"
                            value="{{ old('direccion', $familiar->domicilio) }}">

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