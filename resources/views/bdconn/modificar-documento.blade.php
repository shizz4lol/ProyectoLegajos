
@extends ('layouts.app')
@section ('contenido') 
  <div class="form-header">
        <div class="titulo-wrap">
            <div>
                <h2>Modificar Documento</h2>
                <p>Modifique la informacion del documento.</p>
            </div>
        </div>
        <button type="button" class="btn-volver" onclick="window.history.back()">
             Volver
        </button>
    </div>
    
    <form action="{{ route('alumnos.documentos.update', ['alumno' => $alumno->id_alumno, 'documento' => $documento->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="tarjeta">
        <h2>Informacion del documento</h2>
        <div class="form-grid">

<div class="campo">
    <label for="nombre">Nombre del documento</label>
    <input type="text" id="nombre" name="documento[nombre]" value="{{ old('documento.nombre', $documento->nombre) }}" required>
</div>

<div class="campo">
    <span class="ic"><i class="fa-solid fa-calendar-days"></i></span>
    <label for="año">Año<span class="req">*</span></label>
    <input type="number" id="año" name="documento[año]" min="2000" max="2100" step="1" value="{{ old('documento.año', $documento->año) }}" required>
</div>

<div class="campo">
    <label for="tipo">Tipo <span class="req">*</span></label>
    <select id="tipo" name="documento[tipo]" required>
        <option value="" disabled>Seleccione un tipo de documento:</option>
        <option value="inscripcion" {{ old('documento.tipo', $documento->tipo) == 'inscripcion' ? 'selected' : '' }}>Inscripcion</option>
        <option value="matricula" {{ old('documento.tipo', $documento->tipo) == 'matricula' ? 'selected' : '' }}>Matricula</option>
        <option value="certificacion" {{ old('documento.tipo', $documento->tipo) == 'certificacion' ? 'selected' : '' }}>Certificacion</option>
        <option value="autorizacion" {{ old('documento.tipo', $documento->tipo) == 'autorizacion' ? 'selected' : '' }}>Autorizacion</option>
        <option value="constancia/apto" {{ old('documento.tipo', $documento->tipo) == 'constancia/apto' ? 'selected' : '' }}>Constancia/Apto</option>
        <option value="acta" {{ old('documento.tipo', $documento->tipo) == 'acta' ? 'selected' : '' }}>Acta</option>
        <option value="diploma" {{ old('documento.tipo', $documento->tipo) == 'diploma' ? 'selected' : '' }}>Diploma</option>
    </select>
</div>

<div class="campo">
    <label>¿Es copia?</label>

    <div class="radio-opciones">
        <label class="radio-opcion">
            <input type="radio" name="documento[copia]" value="1"
                {{ old('documento.copia', $documento->copia) == 1 ? 'checked' : '' }}>
            <span>Si</span>
        </label>

        <label class="radio-opcion">
            <input type="radio" name="documento[copia]" value="0"
                {{ old('documento.copia', $documento->copia) == 0 ? 'checked' : '' }}>
            <span>No</span>
        </label>
    </div>
</div>

<div class="campo">
    <span class="ic"><i class="fa-solid fa-file"></i></span>
    <label>Archivo actual<span class="req">*</span></label>

    <div id="archivo-actual">
        {{ basename($documento->archivo_adj) }}
    </div>

    <label for="archivoadj" class="btn-seleccionar" id="nombrearchivo">
        Reemplazar archivo
    </label>

    <input type="file" id="archivoadj" name="documento[archivoadj]">
</div>

</div>       

            <p class="form-hint">Los campos marcados con (<span class="req">*</span>) son obligatorios.</p>
        </div>

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
            label.textContent = 'Reemplazar archivo';
        }
    });
</script>
@endsection
