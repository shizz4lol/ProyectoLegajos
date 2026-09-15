@extends('layouts.app')
@section ('contenido')
        <div class="titulo">

            <h1>Modificar familiar</h1>

            <p>
                Modifique los datos del familiar.
            </p>

        </div>


        <form action="{{ route('alumnos.familiares.update', ['alumno' => $alumno->id_alumno, 'familiar' => $familiar->id])}}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')

            <div class="tarjeta">

                <h2>Datos del familiar</h2>


                <div class="form-grid">


                    <div class="campo">
                        <label for="nombre">Nombre</label>

                        <input type="text" id="nombre" name="familiar[nombre]" 
                        value="{{ old('nombre', $familiar->nombre) }}"required>

                    </div>


                    <div class="campo">

                        <label for="apellido">Apellido</label>

                        <input type="text" id="apellido" name="familiar[apellido]"
                            value="{{ old('apellido', $familiar->apellido) }}" required>
                    </div>


                    <div class="campo">

                        <label for="dni">DNI</label>

                        <input
                            type="text"
                            id="dni"
                            name="familiar[dni]"
                            value="{{ old('dni', $familiar->dni) }}">

                    </div>
                    <div class="campo">
                        <label for="fecha_nacimiento">F. Nacimiento <span class="req">*</span></label>
                        <input type="date" id="fecha_nacimiento" name="familiar[fecha_nacimiento]" value="{{ old('fecha_nacimiento', $familiar->fecha_nacimiento) }}" required>
                    </div>
                    <div class="campo">

                        <label for="parentesco">Parentesco</label>
                        <input
                            type="text"
                            id="parentesco"
                            name="familiar[parentesco]"
                            value="{{ old('parentesco', $familiar->parentesco) }}">
                    </div>


                    <div class="campo">

                        <label for="telefono">Teléfono</label>

                        <input
                            type="text"
                            id="telefono"
                            name="familiar[telefono]"
                            value="{{ old('telefono', $familiar->telefono) }}">

                    </div>


                    <div class="campo">

                        <label for="email">Email</label>

                        <input
                            type="email"
                            id="email"
                            name="familiar[email]"
                            value="{{ old('email', $familiar->email) }}">

                    </div>


                    <div class="campo">

                        <label for="domicilio">Domicilio</label>

                        <input
                            type="text"
                            id="domicilio"
                            name="familiar[domiciliodomicilio]"
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