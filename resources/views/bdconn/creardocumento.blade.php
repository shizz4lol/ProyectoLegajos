@extends ('layouts.app')
@section ('contenido') 
  <div class="form-header">
        <div class="titulo-wrap">
            <div>
                <h2>Crear nuevo Documento</h2>
                <p>Complete la informacion para dar de alta el documento en el sistema.</p>
                <p id="aviso">{{ session('aviso') }}</p>
            </div>
        </div>
        <button type="button" class="btn-volver" onclick="window.history.back()">
             Volver
        </button>
    </div>
    
    <form action="" method="POST" autocomplete="off">
    @csrf
        <div class="legajo-card">
            <div class="legajo-card-top">
                <div class="nombre-wrap">
                    <label for="nombre">Nombre del documento</label>
                    <input type="text" id="nombre" name="" class="input-nombre" required  >
                </div>
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-graduation-cap"></i></span>
                <label for="tipo">Tipo <span class="req">*</span></label>
                <select id="tipo" name="" required>
                    <option value="" disabled selected>Seleccione un tipo de documento:</option>
                    <option value="certificacion">Certificacion</option>
                    <option value="autorizacion">Autorizacion</option>
                    <option value="inscripcion">Inscripcion</option>
                    <option value="constancia/apto">Constancia/Apto</option>
                    <option value="matricula">Matricula</option>
                </select>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-calendar-days"></i></span>
                <label for="año">Año<span class="req">*</span></label>
                <input type="number" id="año" name="año" min="2000" max="2100" step="1" required>
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-calendar-days"></i></span>
                <label>¿Es copia?<span class="req">*</span></label>
                <input type="checkbox" id="copia" required>
                <label for="copia" id="checkboxsi">Si</label>
            </div>


            <!-- Email -->
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-envelope"></i></span>
                <label for="archivoadj">Adjunte su archivo<span class="req">*</span></label>
                <label for="archivoadj" class="btn-seleccionar">Seleccionar Archivo</label>
                <input type="file" id="archivoadj" name="" required>
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