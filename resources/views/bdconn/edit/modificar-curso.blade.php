@extends('layouts.app')
@section ('contenido')


        <div class="titulo">

            <h1>Cambio de curso</h1>
            <p>
                Modifique el curso y/o division de su alumno.
            </p>

        </div>
        <form action="{{ route('updatecurso', ['alumno' => $alumno->id_alumno]) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="tarjeta">

                <h2>Cambie el curso del alumno de manera manual</h2>
                    <div class="campo">

                        <label for="curso">
                            Curso
                        </label>

                        <select name="curso" class="select" required>
                            <option value="" disabled selected>Seleccione un curso...</option>
                            <option value="1°">1°</option>
                            <option value="2°">2°</option>
                            <option value="3°">3°</option>
                            <option value="4°">4°</option>
                            <option value="5°">5°</option>
                            <option value="6°">6°</option>
                        </select>

                    </div></br>


                    <div class="campo">

                        <label for="division">
                            DNI
                        </label>

                        <select name="division" class="select" required>
                            <option value="" disabled selected>Seleccione una division...</option>
                            <option value="1°">1°</option>
                            <option value="2°">2°</option>
                            <option value="3°">3°</option>
                            <option value="4°">4°</option>
                            <option value="5°">5°</option>
                            <option value="6°">6°</option>
                        </select>

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
