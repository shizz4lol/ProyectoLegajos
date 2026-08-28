@extends ('layouts.app')
@section ('contenido')
    <div class="panel-card">
      <h3>¡Bienvenido/a! <span class="badge-rol Secretaria">al panel de Secretaria</span></h3>
      <p class="sub">Panel principal · Resumen general del sistema</p>
      <p class="tip"></p>
    </div>
    <p id="aviso">{{ session('aviso') }}</p>
    <div class="stats-row" style="margin-bottom:22px;">
      <div class="stat-box blue">
        <div class="ic"><img src="imagen/usuario.png" alt=""></div>
        <div><div class="num">{{ $alumnos->count() }}</div><div class="lbl">Alumnos totales</div></div>
      </div>
      <div class="stat-box purple">
        <div class="ic"><img src="imagen/hoja.png" alt=""></div>
        <div><div class="num">{{ $alumnos->sum(fn($alumno) => $alumno->documentos->count()) }}</div><div class="lbl">Documentos subidos al sistema</div></div>
      </div>
    </div>

    <h2 class="section-title">Cursos</h2>
    <p class="section-sub">Todos los cursos disponibles</p>

    <div class="cursos-cols">
      <div class="curso-col" data-turno="manana">
        <div class="titulo-col"><span class="dot manana"></span>Turno Mañana</div>
        <div class="curso-fila"><span>1° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 5°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 5°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 5°</span><span class="flecha">›</span></div>
      </div>

      <div class="curso-col" data-turno="tarde">
        <div class="titulo-col"><span class="dot tarde"></span>Turno Tarde</div>
        <div class="curso-fila"><span>1° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 5°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 5°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 5°</span><span class="flecha">›</span></div>
      </div>

      <div class="curso-col" data-turno="vespertino">
        <div class="titulo-col"><span class="dot vespertino"></span>Turno Vespertino</div>
        <div class="curso-fila"><span>4° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>4° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>4° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>4° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>4° 5°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>5° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>5° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>5° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>5° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>5° 5°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>6° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>6° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>6° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>6° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>6° 5°</span><span class="flecha">›</span></div>
      </div>
    </div>
  </div>
@endsection
@section ('script')
<script>
  var clasesPorTurno = {
  manana: 'sel-manana',
  tarde: 'sel-tarde',
  vespertino: 'sel-vespertino'
};

document.querySelectorAll('.curso-col').forEach(function(col) {
  col.addEventListener('click', function(event) {
    // Evita que el click se propague al document
    event.stopPropagation();
    document.querySelectorAll('.curso-col').forEach(function(c) {
      c.classList.remove(
        'sel-manana',
        'sel-tarde',
        'sel-vespertino'
      );
    });

    col.classList.add(clasesPorTurno[col.dataset.turno]);
  });
});
document.addEventListener('click', function(event) {
  if (!event.target.closest('.curso-col')) {
    document.querySelectorAll('.curso-col').forEach(function(col) {
      col.classList.remove(
        'sel-manana',
        'sel-tarde',
        'sel-vespertino'
      );
    });
  }
});
</script>