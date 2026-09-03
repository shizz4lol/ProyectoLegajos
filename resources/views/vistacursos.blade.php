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
    </header>

        
    <section class="seleccion-cursos">
        <h2>Años</h2>
            <div class="años-container">

                @foreach ($cursos as $curso)
                    <div class="año-card">
                        
                        <div class="año-titulo">
                            <h3>{{ $curso->curso }}</h3>
                        </div>

                        <div class="divisiones-container">
                            @foreach ($curso->divisiones as $division)
                                <div class="division-card">
                                    <h4>{{ $division->division }}</h4>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>

    </section>
</main>

@endsection