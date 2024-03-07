(function () {
    document.addEventListener('DOMContentLoaded', () => {

        const formulario = document.querySelector('#register-formulario');
        const inputs = document.querySelectorAll(['input[type="text"]', 'input[type="email"]', 'input[type="tel"]', 'input[type="password"]']);
        const passwords = document.querySelectorAll('input[type="password"]');
        const nombreApellido = document.querySelectorAll('input[type="text"]');
        const nombre = document.querySelector('#register-name');
        const apellido = document.querySelector('#register-apellido');
        const email = document.querySelector('input[type="email"]');
        const telefono = document.querySelector('input[type="tel"]');

        let errores = [];

        const emailRegex = /^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const nombreRegex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,15}$/;
        const telefonoRegex = /^[0-9\s-]{4,15}$/;




        formulario.addEventListener('submit', (e) => {
            e.preventDefault();
            errores = [];

            // Validar que no haya campos vacios
            inputs.forEach(input => {
                input.classList.remove('b-red');
                if (input.value === '') {
                    input.classList.add('b-red');
                    errores = [...errores, input.id];
                }
            });

            // Valida que los passwords sean iguales y tengan mas de 4 caracteres
            if (passwords[0].value.length < 4 || passwords[0].value !== passwords[1].value) {
                passwords[0].classList.add('b-red');
                passwords[1].classList.add('b-red');

                errores = [...errores, passwords[0].id];
            }

            // Valida la extensión de Nombre y Apellido
            nombreApellido.forEach(input => {

                if (!nombreRegex.test(input.value)) {

                    input.classList.add('b-red');
                    errores = [...errores, input.id];

                }
            });

            // Valida el formato del Email
            if (!emailRegex.test(email.value)) {

                email.classList.add('b-red');
                errores = [...errores, email.id];

            }

            // Valida el formato del Telefono
            if (!telefonoRegex.test(telefono.value)) {

                telefono.classList.add('b-red');
                errores = [...errores, telefono.id];

            }

            if (!errores.length) {
                // No hay errores
                (async () => {
                    const respuesta = await nuevoUsuario();


                    if (respuesta.mensaje === true) {
                        // redirigir al usuario
                        console.log(respuesta.almacenamiento);
                        console.log(respuesta);
                        setTimeout(() => {
                            window.location.href = "/";
                        }, 1000);

                    } else {
                        // Informar Error
                        if (document.querySelector('.formulario__error')) {
                            const erroresPrevios = document.querySelectorAll('.formulario__error');
                            erroresPrevios.forEach(error => error.remove());
                        }

                        const error = document.createElement('P');
                        error.classList.add('formulario__error');
                        error.textContent = respuesta.mensaje;

                        formulario.insertBefore(error, formulario.firstChild);
                    }

                })();

            }

            async function nuevoUsuario() {

                const url = '/register/create';
                const datos = new FormData();
                datos.append('name', nombre.value);
                datos.append('apellido', apellido.value);
                datos.append('telefono', telefono.value);
                datos.append('email', email.value);
                datos.append('password', passwords[0].value);

                try {

                    const respuesta = await fetch(url, {
                        method: 'POST',
                        body: datos
                    });

                    const resultado = await respuesta.json();

                    return resultado;

                } catch (error) {
                    console.log(error);
                }
            }
        });
    });
})();
