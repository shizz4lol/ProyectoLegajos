<script>

function configurarPassword(inputId, botonId, iconoId) {

    const password = document.getElementById(inputId);
    const botonPassword = document.getElementById(botonId);
    const iconoPassword = document.getElementById(iconoId);

    // Si alguno de los elementos no existe en la página,
    // no hacemos nada.
    if (!password || !botonPassword || !iconoPassword) {
        return;
    }

    botonPassword.addEventListener("click", function () {

        if (password.type === "password") {

            // Mostrar contraseña
            password.type = "text";

            botonPassword.setAttribute(
                "aria-label",
                "Ocultar contraseña"
            );

            iconoPassword.innerHTML = `
                <path d="M3 3l18 18"/>
                <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/>
                <path d="M9.9 5.1A10.7 10.7 0 0 1 12 5
                         c7 0 10 7 10 7
                         a18.5 18.5 0 0 1-3.1 4.2"/>
                <path d="M6.6 6.6C3.6 8.5 2 12 2 12
                         s3.5 7 10 7
                         c1.8 0 3.4-.5 4.7-1.2"/>
            `;

        } else {

            // Ocultar contraseña
            password.type = "password";

            botonPassword.setAttribute(
                "aria-label",
                "Mostrar contraseña"
            );

            iconoPassword.innerHTML = `
                <path d="M2 12s3.5-7 10-7
                         10 7 10 7
                         -3.5 7-10 7
                         S2 12 2 12z"/>
                <circle cx="12" cy="12" r="3"/>
            `;
        }
    });
}

configurarPassword(
    "password",
    "mostrarPassword",
    "iconoPassword"
);

configurarPassword(
    "password_confirm",
    "mostrarPasswordConfirm",
    "iconoPasswordConfirm"
);

</script>