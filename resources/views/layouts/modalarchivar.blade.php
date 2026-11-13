
<div class="modal fade" id="archivar" tabindex="-1" aria-labelledby="archivarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="archivarLabel">¿Desea archivar este legajo?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>El alumno será marcado como archivado y dejará de aparecer en los listados habituales.</p>
                <p>Podrá consultar su legajo desde la sección de archivados.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('alumnos.archivar', $alumno->id_alumno) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Archivar</button>
                </form>
            </div>
        </div>
    </div>
</div>
