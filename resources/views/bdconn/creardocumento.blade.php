@extends ('layouts.app')
@section ('contenido') 
  <div class="form-header">
        <div class="titulo-wrap">
            <div>
                <h2>Cargar nuevo Documento</h2>
                <p>Complete la informacion para dar de alta el documento en el sistema.</p>
            </div>
        </div>
        <button type="button" class="btn-volver" onclick="window.history.back()">
             Volver
        </button>
    </div>
    
    <form action="{{route('alumnos.documentos.store', $alumno->id_alumno)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
        <div class="legajo-card">
            <div class="legajo-card-top">
                <div class="nombre-wrap">
                    <label for="nombre">Nombre del documento</label>
                    <input type="text" id="nombre" name="documento[nombre]" class="input-nombre" required  >
                </div>
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-graduation-cap"></i></span>
                <label for="tipo">Tipo <span class="req">*</span></label>
                <select id="tipo" name="documento[tipo]" required>
                    <option value="" disabled selected>Seleccione un tipo de documento:</option>
                    <option value="inscripcion">Inscripcion</option>
                    <option value="matricula">Matricula</option>
                    <option value="certificacion">Certificacion</option>
                    <option value="autorizacion">Autorizacion</option>
                    <option value="constancia/apto">Constancia/Apto</option>
                    <option value="constancia/apto">Acta</option>
                    <option value="matricula">Diploma</option>
                </select>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-calendar-days"></i></span>
                <label for="año">Año<span class="req">*</span></label>
                <input type="number" id="año" name="documento[año]" min="2000" max="2100" step="1" required>
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-calendar-days"></i></span>
                <label>¿Es copia? (puede dejarlo vacio)</label>
                <input type="checkbox" id="copia" name="documento[copia]" value="1" required>
                <label for="copia" id="checkboxsi" >Si</label>
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-envelope"></i></span>
                <label for="">Adjunte su archivo<span class="req">*</span></label>
                <label for="archivoadj" class="btn-seleccionar" id="nombrearchivo">Seleccionar Archivo</label>
                <input type="file" id="archivoadj" name="documento[archivoadj]" required>
            </div>

            <p class="form-hint">Los campos marcados con (<span class="req">*</span>) son obligatorios.</p>
        </div>
        <!-- Botón para guardar -->
            <button type="submit" class="btn-guardar-legajo">
                <i class="fa-solid fa-floppy-disk"></i> Guardar Datos
            </button>
    </form>    
  </div>
@endsection
@section ('script')
<script>
    document.getElementById('archivoadj').addEventListener('change', function () {
        const label = document.getElementById('nombrearchivo');

        if (this.files.length > 0) {
            label.textContent = '✓ ' + this.files[0].name;
        } else {
            label.textContent = 'Seleccionar Archivo';
        }
    });
</script>
@endsection