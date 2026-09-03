<h2 class="section-title">Cursos</h2>
<p class="section-sub">Todos los cursos disponibles</p>

<div class="cursos-cols">

    <div class="curso-col" data-turno="manana">
        <div class="titulo-col">
            <span class="dot manana"></span>Turno Mañana
        </div>

        @foreach ($cursos as $curso)
            @foreach ($curso->divisiones as $division)
                @if ($division->pivot->turno == 'Mañana')
                    <div class="curso-fila">
                        <a href="{{route('curso', ['id_curso' => $curso->id,'id_division' => $division->id])}}">
                        <span>{{ $curso->curso }} {{ $division->division }}</span>
                        <span class="flecha">›</span>
                        </a>
                    </div>
                @endif
            @endforeach
        @endforeach

    </div>

    <div class="curso-col" data-turno="tarde">
        <div class="titulo-col">
            <span class="dot tarde"></span>Turno Tarde
        </div>

        @foreach ($cursos as $curso)
            @foreach ($curso->divisiones as $division)
                @if ($division->pivot->turno == 'Tarde')
                    <div class="curso-fila">
                        <a href="{{route('curso', ['id_curso' => $curso->id,'id_division' => $division->id])}}">
                        <span>{{ $curso->curso }} {{ $division->division }}</span>
                        <span class="flecha">›</span>
                        </a>
                    </div>
                @endif
            @endforeach
        @endforeach

    </div>

    <div class="curso-col" data-turno="vespertino">
        <div class="titulo-col">
            <span class="dot vespertino"></span>Turno Vespertino/Noche
        </div>

        @foreach ($cursos as $curso)
            @foreach ($curso->divisiones as $division)
                @if ($division->pivot->turno == 'Noche')
                    <div class="curso-fila">
                        <a href="{{route('curso', ['id_curso' => $curso->id,'id_division' => $division->id])}}">
                        <span>{{ $curso->curso }} {{ $division->division }}</span>
                        <span class="flecha">›</span>
                        </a>
                    </div>
                @endif
            @endforeach
        @endforeach

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