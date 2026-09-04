@extends ('layouts.app')
@section ('contenido') 
    <div class="panel-card">
      <h3>¡Bienvenido/a {{Auth::user()->nombre }}! <span class="badge-rol Preceptor">al panel de Preceptoria</span></h3>
      <p class="sub">Panel principal.</p>
    </div>
    <div class="stats-row" style="margin-bottom:22px;">
      <div class="stat-box">
        <div class="ic"><img src="/imagen/usuario.png" alt=""></div>
        <div><div class="num">{{$alumnos->count()}}</div><div class="lbl">Alumnos totales</div></div>
      </div>
      <div class="stat-box">
        <div class="ic"><img src="/imagen/hoja.png" alt=""></div>
        <div><div class="num">{{ $alumnos->sum(fn($alumno) => $alumno->documentos->count()) }}</div><div class="lbl">Documentos subidos al sistema</div></div>
      </div>
    </div>

    <h2 class="section-title">Alumnos del curso</h2>
    <p class="section-sub">Todos los alumnos cargados</p>

    <div class="cursos-cols">
      <a href="{{route('curso', ['id_curso' => session('prece_curso'),'id_division' => session('prece_division')])}}">
      <div class="curso-col" data-turno="manana">
        <p>{{$curso->curso}}{{$division->division}}</p>
        <div class="titulo-col"><span class="dot manana"></span>Turno {{$cursoDivision->turno}}</div>
        @foreach ($alumnos as $alumno)
          <div class="curso-nombre"><span>{{ $alumno->nombre }} {{ $alumno->apellido }}</span></div>
        @endforeach
      </div>
      </a>

    </div>
  </div>
@endsection
