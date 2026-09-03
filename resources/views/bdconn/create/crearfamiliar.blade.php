@extends ('layouts.app')
@section ('contenido') 
  <div class="form-header">
        <div class="titulo-wrap">
            <div>
                <h2>Cargar nuevo familiar</h2>
                <p>Complete los datos correspondientes para darlo de alta</p>
            </div>
        </div>
        <button type="button" class="btn-volver" onclick="window.history.back()">
             Volver
        </button>
    </div>
    
    <form action="{{route('alumnos.familiares.store',$alumno->id_alumno)}}" method="POST" id="crear" autocomplete="off">
    @csrf
        <div class="legajo-card">
            <h2>Datos del familiar</h2>
            <div class="legajo-card-top">
                <div class="avatar-generico">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="nombre-wrap">
                    <label for="f_nombre">Nombre/s<span class="req">*</span></label>
                    <input type="text" id="f_nombre" name="familiar[nombre]" class="input-nombre" required  >
                    <label for="f_apellido">Apellido/s<span class="req">*</span></label>
                    <input type="text" id="f_apellido" name="familiar[apellido]" class="input-nombre" required  >
                </div>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-address-card"></i></span>
                <label for="f_dni">DNI <span class="req">*</span></label>
                <input type="text" id="f_dni" maxlength="8" name="familiar[dni]" placeholder="Sin puntos o espacios" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-calendar-days"></i></span>
                <label for="mfecha_nacimiento">F. Nacimiento <span class="req">*</span></label>
                <input type="date" id="mfecha_nacimiento" name="familiar[fecha_nacimiento]" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-envelope"></i></span>
                <label for="f_email">Email <span class="req">*</span></label>
                <input type="email" id="f_email" name="familiar[email]" placeholder="Ej: familiar@example.com" required>
            </div>
            
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-phone"></i></span>
                <label for="f_telefono">Teléfono <span class="req">*</span></label>
                <input type="tel" id="f_telefono" name="familiar[telefono]" placeholder="Ej: 299 123-4567" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-location-dot"></i></span>
                <label for="f_domicilio">Domicilio <span class="req">*</span></label>
                <input type="text" id="f_domicilio" name="familiar[domicilio]" placeholder="Ej: Av. Argentina 123, Neuquén" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-location-dot"></i></span>
                <label for="f_parentesco">Parentesco<span class="req">*</span></label>
                <input type="text" id="f_parentesco" name="familiar[parentesco]" placeholder="Ej: hermano" required>
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