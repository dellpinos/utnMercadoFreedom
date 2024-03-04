(function () {
    document.addEventListener('DOMContentLoaded', () => {

        const formulario = document.querySelector('#login-formulario');
        const inputs = document.querySelectorAll(['input[type="email"]', 'input[type="password"]']);
        const passwords = document.querySelectorAll('input[type="password"]');
        const email = document.querySelector('input[type="email"]');

        let errores = [];

        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;


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
            if (passwords[0].value.length < 4) {
                passwords[0].classList.add('b-red');

                errores = [...errores, passwords[0].id];
            }


            // Valida el formato del Email
            if (!emailRegex.test(email.value)) {

                email.classList.add('b-red');
                errores = [...errores, email.id];

            }



            if (!errores.length) {
                // No hay errores
                (async () => {
                    const respuesta = await loginUsuario();

                    
                    if(respuesta.almacenamiento) {
                        // redirigir al usuario
                        console.log(respuesta.almacenamiento);

                    } else {
                        console.log("Algo salió mal")
                    }

                })();

                


            }




            /// >>>>

            async function loginUsuario() {

                const url = '/login/auth';
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
