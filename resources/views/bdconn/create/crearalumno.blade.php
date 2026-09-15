@extends ('layouts.app')
@section ('contenido')
  <div class="form-header">
        <div class="titulo-wrap">
            <div>
                <h2>Crear nuevo Legajo</h2>
                <p>Complete los datos correspondientes para dar de alta al alumno en el sistema.</p>
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
                    <option value="7°">7°</option>
                </select>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-calendar-days"></i></span>
                <label for="fecha_nacimiento">F. Nacimiento <span class="req">*</span></label>
                <input type="date" id="fecha_nacimiento" name="alumno[fecha_nacimiento]" required>
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-phone"></i></span>
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="alumno[telefono]" placeholder="Ej: 299 123-4567">
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-envelope"></i></span>
                <label for="email">Email</label>
                <input type="email" id="email" name="alumno[email]" placeholder="Ej: alumno@example.com">
</div>

            <p class="form-hint">Los campos marcados con (<span class="req">*</span>) son obligatorios.</p>
        </div>


        <div class="check-row-tutor">
            <input type="checkbox" id="check_cargar_tutor" onchange="toggleTutor(this)">
            <label for="check_cargar_tutor">
                El alumno/a no vive con sus padres — cargar datos de un <strong>tutor</strong> en su lugar
            </label>
        </div>

        <div class="padres-card" id="padres-wrap">
        <div class="legajo-card" id="wrap-madre">
            <h2>Datos de la Madre</h2>

   
            <div class="check-row-vacio">
                <input type="checkbox" id="check_madre_vacio" onchange="toggleSeccionVacia(this, 'campos-madre')">
                <label for="check_madre_vacio">No posee estos datos / dejar en blanco</label>
            </div>

            <div id="campos-madre">
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
                    <span class="ic"><i class="fa-solid fa-calendar-days"></i></span>
                    <label for="m_fecha_nacimiento">F. Nacimiento <span class="req">*</span></label>
                    <input type="date" id="m_fecha_nacimiento" name="madre[fecha_nacimiento]" required>
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
            </div>
           
        </div>

        <div class="legajo-card" id="wrap-padre">
            <h2>Datos del Padre</h2>

            <div class="check-row-vacio">
                <input type="checkbox" id="check_padre_vacio" onchange="toggleSeccionVacia(this, 'campos-padre')">
                <label for="check_padre_vacio">No posee estos datos / dejar en blanco</label>
            </div>

            <div id="campos-padre">
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
                    <span class="ic"><i class="fa-solid fa-calendar-days"></i></span>
                    <label for="p_fecha_nacimiento">F. Nacimiento <span class="req">*</span></label>
                    <input type="date" id="p_fecha_nacimiento" name="padre[fecha_nacimiento]" required>
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
            </div>
            <p class="form-hint">Los campos marcados con (<span class="req">*</span>) son obligatorios.</p>
        </div>
        </div>

        <div id="tutor-wrap" style="display:none;">
            <div class="legajo-card" id="wrap-tutor">
                <h2>Datos del Tutor/a</h2>
                <div id="campos-tutor">
                    <div class="legajo-card-top">
                        <div class="avatar-generico">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <div class="nombre-wrap">
                            <label for="t_nombre">Nombre/s<span class="req">*</span></label>
                            <input type="text" id="t_nombre" name="tutor[nombre]" class="input-nombre">
                            <label for="t_apellido">Apellido/s<span class="req">*</span></label>
                            <input type="text" id="t_apellido" name="tutor[apellido]" class="input-nombre">
                        </div>
                    </div>
                    <div class="campo-icono-form">
                        <span class="ic"><i class="fa-solid fa-address-card"></i></span>
                        <label for="t_dni">DNI <span class="req">*</span></label>
                        <input type="text" id="t_dni" maxlength="8" name="tutor[dni]" placeholder="Sin puntos o espacios" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    <div class="campo-icono-form">
                        <span class="ic"><i class="fa-solid fa-calendar-days"></i></span>
                        <label for="t_fecha_nacimiento">F. Nacimiento <span class="req">*</span></label>
                        <input type="date" id="t_fecha_nacimiento" name="tutor[fecha_nacimiento]" required>
                    </div>
                    <div class="campo-icono-form">
                        <span class="ic"><i class="fa-solid fa-location-dot"></i></span>
                        <label for="t_domicilio">Domicilio <span class="req">*</span></label>
                        <input type="text" id="t_domicilio" name="tutor[domicilio]" placeholder="Ej: Av. Argentina 123, Neuquén">
                    </div>
                    <div class="campo-icono-form">
                        <span class="ic"><i class="fa-solid fa-phone"></i></span>
                        <label for="t_telefono">Teléfono <span class="req">*</span></label>
                        <input type="tel" id="t_telefono" name="tutor[telefono]" placeholder="Ej: 299 123-4567">
                    </div>
                    <div class="campo-icono-form">
                        <span class="ic"><i class="fa-solid fa-envelope"></i></span>
                        <label for="t_email">Email <span class="req">*</span></label>
                        <input type="email" id="t_email" name="tutor[email]" placeholder="Ej: tutor@example.com">
                    </div><div class="campo-icono-form">
                        <span class="ic"><i class="fa-solid fa-location-dot"></i></span>
                        <label for="f_parentesco">Parentesco<span class="req">*</span></label>
                        <input type="text" id="f_parentesco" name="tutor[parentesco]" placeholder="Ej: hermano" required>
                    </div>
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
        function setRequeridos(contenedor, activo) {
            if (!contenedor) return;

            contenedor.querySelectorAll('input, select').forEach(function (campo) {
                if (campo.type === 'checkbox') return;

                campo.required = activo;
                campo.disabled = !activo;

        // Si se desactiva la sección, borrar el contenido
                if (!activo) {
                    campo.value = '';
                }
            });
        }
        function toggleSeccionVacia(checkbox, contenedorId) {
            const contenedor = document.getElementById(contenedorId);
            setRequeridos(contenedor, !checkbox.checked);
            contenedor.classList.toggle('seccion-vacia', checkbox.checked);
        }

        function toggleTutor(checkbox) {
            const padresWrap = document.getElementById('padres-wrap');
            const tutorWrap = document.getElementById('tutor-wrap');

            if (checkbox.checked) {
                padresWrap.style.display = 'none';
                tutorWrap.style.display = 'block';
                setRequeridos(document.getElementById('campos-madre'), false);
                setRequeridos(document.getElementById('campos-padre'), false);
                setRequeridos(document.getElementById('campos-tutor'), true);
            } else {
                padresWrap.style.display = 'flex';
                tutorWrap.style.display = 'none';
                setRequeridos(document.getElementById('campos-tutor'), false);

                const madreVacia = document.getElementById('check_madre_vacio').checked;
                const padreVacio = document.getElementById('check_padre_vacio').checked;
                setRequeridos(document.getElementById('campos-madre'), !madreVacia);
                setRequeridos(document.getElementById('campos-padre'), !padreVacio);
            }
        }
        document.addEventListener('DOMContentLoaded', function () {
            setRequeridos(document.getElementById('campos-tutor'), false);
        });
    </script>
@endsection