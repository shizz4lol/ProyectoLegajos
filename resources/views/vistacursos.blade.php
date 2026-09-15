@extends ('layouts.app')

@section ('contenido')
<main>
    <nav class="breadcrumb">
        <a href="{{route('inicio')}}">Inicio</a>
        <span>›</span>
        <span>Cursos</span>
    </nav>

    <header>
        <h1>Cursos</h1>
        <p>Seleccione un año para ver los cursos disponibles</p>

        @if (session('rol')==='secretaria')
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pasar" id="pasara">Pasar de año</button>
        @endif
    </header>

    <section class="seleccion-cursos">
        <div class="años-container">

            @foreach ($cursos as $curso)
                <div class="año-card">
                    <h3>{{$curso->curso}}</h3>

                    <div class="divisiones-container">
                        @foreach ($curso->divisiones as $division)
                            <a href="{{route('curso', [
                                'id_curso' => $curso->id,
                                'id_division' => $division->id
                            ])}}">
                                <div class="division-card">
                                    <h4>{{$curso->curso}}{{ $division->division }}</h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </section>
</main>
<div class="modal fade" id="pasar" tabindex="-1" aria-labelledby="pasarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pasarLabel">¿Desea pasar de año?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Se actualizarán todos los alumnos de la institución.
                    Los alumnos de 6° año pasarán a considerarse egresados.</p>
                <p>Esta acción será permanente, pero podra modificar de manera individual a cada alumno, si asi lo deseara.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('pasar') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-volver">Pasar de año</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection