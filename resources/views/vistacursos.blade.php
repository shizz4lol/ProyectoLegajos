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
            <div class="años-container">

                @foreach ($cursos as $curso)
                    <div class="año-card">
                        <h3>{{$curso->curso}}</h3>
                        <div class="divisiones-container">
                            @foreach ($curso->divisiones as $division)
                                <a href="{{route('curso', ['id_curso' => $curso->id,'id_division' => $division->id])}}">
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

@endsection