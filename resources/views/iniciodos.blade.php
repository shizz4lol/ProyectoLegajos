@extends('layouts.app')
@section ('contenido')
    <div class="panel-card">
      <h3>¡Bienvenido/a {{Auth::user()->nombre }}! <span class="badge-rol JefePreceptores">al panel de Jefatura</span></h3>
      <p class="sub">Panel principal: Resumen general del sistema</p>
    </div>

    <div class="stats-row" style="margin-bottom:22px;">
      <div class="stat-box blue">
        <div class="ic"><img src="/imagen/usuario.png" alt=""></div>
        <div><div class="num">{{ $alumnos->count() }}</div><div class="lbl">Alumnos totales</div></div>
      </div>
      <div class="stat-box purple">
        <div class="ic"></div>
        <div><div class="num">{{ $alumnos->sum(fn($alumno) => $alumno->documentos->count()) }}</div><div class="lbl">Documentos subidos al sistema</div></div>
      </div>
    </div>

    @include('layouts.todoscursos')
@endsection
