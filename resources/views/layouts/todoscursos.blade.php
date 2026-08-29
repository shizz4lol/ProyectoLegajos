
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