( function() {

    console.log('Probando');

    const formulario = document.querySelector('#contacto-formulario');
    const inputs = document.querySelectorAll(['input[type="text"]','input[type="email"]','input[type="tel"]', 'textarea']);

    const dropDown = document.querySelector('#tipo');
    console.log(inputs)


    let errores = []






    formulario.addEventListener('submit', (e) => {
        e.preventDefault();
        errores = [];
        dropDown.classList.remove('b-red');

        if(dropDown.value !== '1' && dropDown.value !== '2') {
            dropDown.classList.add('b-red');
            errores = [...errores, dropDown.id];
        }

        inputs.forEach( (input) => {
            input.classList.remove('b-red');
            if(input.value === '') {
                input.classList.add('b-red');
                errores = [...errores, input.id];
            }

        })

        const icono = document.querySelector('#contenedor-aux');
        if(errores.length !== 0) {
            icono.innerHTML = `
            <p class="contacto__mensaje c-red">Todos los campos son obligatorios</p>
            <img class="contacto__icono" src="img/cancel.svg" alt="Icono Cancel">
            `;
        } else {
            icono.innerHTML = `
            <p class="contacto__mensaje">Te contactaré lo antes posible</p>
            <img class="contacto__icono" src="img/clock.svg" alt="Icono Reloj">
            `;
        }




    });


})();