(function () {
    document.addEventListener('DOMContentLoaded', () => {

        const formulario = document.querySelector('#contacto-formulario');
        const inputs = document.querySelectorAll(['input[type="text"]', 'input[type="email"]', 'input[type="tel"]', 'textarea']);
        const dropDown = document.querySelector('#tipo');
        let errores = [];

        formulario.addEventListener('submit', (e) => {
            e.preventDefault();
            errores = [];
            dropDown.classList.remove('b-red');

            if (dropDown.value !== '1' && dropDown.value !== '2') {
                dropDown.classList.add('b-red');
                errores = [...errores, dropDown.id];
            }

            inputs.forEach((input) => {
                input.classList.remove('b-red');
                if (input.value === '') {
                    input.classList.add('b-red');
                    errores = [...errores, input.id];
                }
            });

            const icono = document.querySelector('#contenedor-aux');
            if (errores.length !== 0) {
                icono.innerHTML = `
            <p class="contacto__mensaje c-red">Todos los campos son obligatorios</p>
            <img class="contacto__icono" src="img/cancel.svg" alt="Icono Cancel">
            `;
            } else {
                icono.innerHTML = `
            <p class="contacto__mensaje">Te contactaré lo antes posible</p>
            <img class="contacto__icono" src="img/clock.svg" alt="Icono Reloj">
            <p id="mensaje-servidor" class="contacto__mensaje"></p>
            `;

                // contactar Servidor
                const getMensaje = () => {
                    const http = new XMLHttpRequest();
                    http.onreadystatechange = () => {

                        if (http.readyState == 4 && http.status == 200) {
                            document.querySelector('#mensaje-servidor').innerHTML = http.responseText;
                            const submit = document.querySelector('input[type="submit"]');
                            submit.classList.add('btn-disabled');
                            submit.disabled = true;

                            inputs.forEach( campo => {
                                campo.classList.add('input-disabled');
                                campo.disabled = true;
                            });
                            dropDown.classList.add('input-disabled');
                            dropDown.disabled = true;

                            // redirigir
                            const cuentaRegresiva = document.createElement('P');
                            cuentaRegresiva.classList.add('contacto__cuenta-regresiva');

                            icono.appendChild(cuentaRegresiva);
                            let i = 10;
                            const intervalo = setInterval(() => {
                                cuentaRegresiva.innerHTML = 'Serás redirigido en <span>' + i + '</span> segs';

                                i--;

                                if (i < 0) {
                                    clearInterval(intervalo);
                                    window.location.href = "/";
                                }
                            }, 1000);
                        }
                    }

                    http.open('GET', './../txt/mensaje.txt', true);
                    http.send();
                }
                getMensaje();
            }
        });
    });
})();