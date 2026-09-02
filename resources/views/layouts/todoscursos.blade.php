
<h2 class="section-title">Cursos</h2>
    <p class="section-sub">Todos los cursos disponibles</p>

    <div class="cursos-cols">
      <div class="curso-col" data-turno="manana">
        <div class="titulo-col"><span class="dot manana"></span>Turno Mañana</div>
      </div>

      <div class="curso-col" data-turno="tarde">
        <div class="titulo-col"><span class="dot tarde"></span>Turno Tarde</div>
      </div>

      <div class="curso-col" data-turno="vespertino">
        <div class="titulo-col"><span class="dot vespertino"></span>Turno Vespertino</div>
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