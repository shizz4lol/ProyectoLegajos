<div class="modal fade" id="archivar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" >¿Desea archivar este legajo?</h1>
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M10.3 3.3L2.2 17.5A2 2 0 0 0 4 20.5h16a2 2 0 0 0 1.8-3L13.7 3.3a2 2 0 0 0-3.4 0z"></path>
            <line x1="12" y1="9" x2="12" y2="13"></line>
            <circle cx="12" cy="16" r="0.8"></circle>
        </svg>
        <button type="button" class="btn-close" id="archivar" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>
            Se lo marcara como "archivado" y no lo podra ver con el resto de alumnos
          </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="{{route('legajos.destroy', $alumno->id_alumno)}}" method="POST">
        @csrf
        @method('DELETE')
            <button type="submit" class="btn btn-primary">Archivar</button>
        </form>
      </div>
    </div>
  </div>
</div>