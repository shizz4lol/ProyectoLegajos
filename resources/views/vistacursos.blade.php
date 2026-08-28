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
                <div class="año-card" data-año="primero">
                    <div class="año-titulo">
                        <h3>1° Año</h3>
                        <span>+</span>
                    </div>
                </div>

                <div class="año-card" data-año="segundo">
                    <div class="año-titulo">
                        <h3>2° Año</h3>
                        <span>+</span>
                    </div>
                </div>

                <div class="año-card" data-año="tercero">
                    <div class="año-titulo">
                        <h3>3° Año</h3>
                        <span>+</span>
                    </div>
                    
                </div>

                <div class="año-card" data-año="cuarto">
                    <div class="año-titulo">
                        <h3>4° Año</h3>
                        <span>+</span>
                    </div>
                </div>

                <div class="año-card" data-año="quinto">
                    <div class="año-titulo">
                        <h3>5° Año</h3>
                        <span>+</span>
                    </div>
                </div>

                <div class="año-card" data-año="sexto">
                        <div class="año-titulo">
                        <h3>6° Año</h3>
                        <span>+</span>
                    </div>
                </div>
            </div>

    </section>
</main>

@endsection