@extends ('layouts.app')
@section ('contenido') 
  <div class="form-header">
        <div class="titulo-wrap">
            <div>
                <h2>Crear nuevo Legajo</h2>
                <p>Complete los datos correspondientes para dar de alta al alumno en el sistema.</p>
                <p id="aviso">{{ session('aviso') }}</p>
            </div>
        </div>
        <button type="button" class="btn-volver" onclick="window.history.back()">
             Volver
        </button>
    </div>
    
    <form action="{{route('legajos.store')}}" method="POST" id="crear" autocomplete="off">
    @csrf
        <div class="legajo-card">
            <h2>Datos del Alumno/a</h2>
            <div class="legajo-card-top">
                <div class="avatar-generico">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="nombre-wrap">
                    <label for="nombre">Nombre/s<span class="req">*</span></label>
                    <input type="text" id="nombre" name="alumno[nombre]" class="input-nombre" required  >
                    <label for="apellido">Apellido/s<span class="req">*</span></label>
                    <input type="text" id="apellido" name="alumno[apellido]" class="input-nombre" required  >
                </div>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-address-card"></i></span>
                <label for="dni">DNI <span class="req"  >*</span></label>
                <input type="text" id="dni" maxlength="8" name="alumno[dni]" placeholder="Sin puntos o espacios" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-graduation-cap"></i></span>
                <label for="curso">Curso <span class="req">*</span></label>
                <select id="curso" name="alumno[curso]" required>
                    <option value="" disabled selected>Seleccione un curso...</option>
                    <option value="1°">1°</option>
                    <option value="2°">2°</option>
                    <option value="3°">3°</option>
                    <option value="4°">4°</option>
                    <option value="5°">5°</option>
                    <option value="6°">6°</option>
                </select>
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-graduation-cap"></i></span>
                <label for="curso">Division <span class="req">*</span></label>
                <select id="division" name="alumno[division]" required>
                    <option value="" disabled selected>Seleccione una division...</option>
                    <option value="1°">1°</option>
                    <option value="2°">2°</option>
                    <option value="3°">3°</option>
                    <option value="4°">4°</option>
                    <option value="5°">5°</option>
                    <option value="6°">6°</option>
                </select>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-calendar-days"></i></span>
                <label for="fecha_nacimiento">F. Nacimiento <span class="req">*</span></label>
                <input type="date" id="fecha_nacimiento" name="alumno[fecha_nacimiento]" required>
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-phone"></i></span>
                <label for="telefono">Teléfono <span class="req">*</span></label>
                <input type="tel" id="telefono" name="alumno[telefono]" placeholder="Ej: 299 123-4567" required>
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-envelope"></i></span>
                <label for="email">Email <span class="req">*</span></label>
                <input type="email" id="email" name="alumno[email]" placeholder="Ej: alumno@example.com" required>
            </div>
            <div class="otra-escuela-row">
                <div class="check-row">
                    <input type="checkbox" id="check_otra_escuela" name="check_otra_escuela" onchange="toggleOtraEscuela(this)">
                    <label for="check_otra_escuela">¿Proviene de otra institución?</label>
                </div>
                <input type="text" id="escuela_origen" name="alumno[escuela_origen]" placeholder="Nombre de la escuela de origen" style="display: none;">
            </div>

            <p class="form-hint">Los campos marcados con (<span class="req">*</span>) son obligatorios.</p>
        </div>
        <div class="padres-card">
        <div class="legajo-card">
            <h2>Datos de la Madre</h2>
            <div class="legajo-card-top">
                <div class="avatar-generico">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="nombre-wrap">
                    <label for="m_nombre">Nombre/s<span class="req">*</span></label>
                    <input type="text" id="m_nombre" name="madre[nombre]" class="input-nombre" required  >
                    <label for="m_apellido">Apellido/s<span class="req">*</span></label>
                    <input type="text" id="m_apellido" name="madre[apellido]" class="input-nombre" required  >
                </div>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-address-card"></i></span>
                <label for="m_dni">DNI <span class="req">*</span></label>
                <input type="text" id="m_dni" maxlength="8" name="madre[dni]" placeholder="Sin puntos o espacios" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-location-dot"></i></span>
                <label for="m_domicilio">Domicilio <span class="req">*</span></label>
                <input type="text" id="m_domicilio" name="madre[domicilio]" placeholder="Ej: Av. Argentina 123, Neuquén" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-phone"></i></span>
                <label for="m_telefono">Teléfono <span class="req">*</span></label>
                <input type="tel" id="m_telefono" name="madre[telefono]" placeholder="Ej: 299 123-4567" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-envelope"></i></span>
                <label for="m_email">Email <span class="req">*</span></label>
                <input type="email" id="m_email" name="madre[email]" placeholder="Ej: madre@example.com" required>
            </div>
            <p class="form-hint">Los campos marcados con (<span class="req">*</span>) son obligatorios.</p>
        </div>
        <div class="legajo-card">
            <h2>Datos del Padre</h2>
            <div class="legajo-card-top">
                <div class="avatar-generico">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="nombre-wrap">
                    <label for="p_nombre">Nombre/s<span class="req">*</span></label>
                    <input type="text" id="p_nombre" name="padre[nombre]" class="input-nombre" required  >
                    <label for="p_apellido">Apellido/s<span class="req">*</span></label>
                    <input type="text" id="p_apellido" name="padre[apellido]" class="input-nombre" required  >
                </div>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-address-card"></i></span>
                <label for="p_dni">DNI <span class="req">*</span></label>
                <input type="text" id="p_dni" maxlength="8" name="padre[dni]" placeholder="Sin puntos o espacios" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-location-dot"></i></span>
                <label for="p_domicilio">Domicilio <span class="req">*</span></label>
                <input type="text" id="p_domicilio" name="padre[domicilio]" placeholder="Ej: Av. Argentina 123, Neuquén" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-phone"></i></span>
                <label for="p_telefono">Teléfono <span class="req">*</span></label>
                <input type="tel" id="p_telefono" name="padre[telefono]" placeholder="Ej: 299 123-4567" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-envelope"></i></span>
                <label for="p_email">Email <span class="req">*</span></label>
                <input type="email" id="p_email" name="padre[email]" placeholder="Ej: padre@example.com" required>
            </div>
            <p class="form-hint">Los campos marcados con (<span class="req">*</span>) son obligatorios.</p>
        </div>
        </div>
            <button type="submit" class="btn-guardar-legajo">
                <i class="fa-solid fa-floppy-disk"></i> Guardar Datos
            </button>
    </form>    
  </div>
@endsection
@section ('script')
    <script>
       

        function toggleOtraEscuela(checkbox) {
            const inputEscuela = document.getElementById('escuela_origen');
            if (checkbox.checked) {
                inputEscuela.style.display = 'block';
                inputEscuela.focus();
            } else {
                inputEscuela.style.display = 'none';
                inputEscuela.value = '';
            }
        }
    </script>
@endsection