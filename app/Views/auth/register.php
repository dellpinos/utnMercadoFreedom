<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MF</title>
    <link rel="icon" href="img/gift.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <header class="home__header">
        <div class="home__contenedor-header">
            <a href="/" class="home__logo">

                <svg class="home__logo-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>

                <h1>Mercado Freedom</h1>
            </a>

            <div class="home__contenedor-nav-btn">
                <a href="<?php echo site_url('/register') ?>" class="btn">Register</a>

                <a href="<?php echo site_url('/login') ?>" class="btn">Login</a>
            </div>


        </div>
    </header>
    <?php if (isset($mensaje)) : ?>
        <p class="home__mensaje"><?php echo $mensaje ?></p>
    <?php endif ?>


    <main class="home__principal bg-white">

        <h2 class="auth__heading">Register</h2>

        <div class="auth__contenedor">

            <div class="auth__contenedor-aux" id="contenedor-aux">
                <p class="auth__mensaje">Nuevo Usuario</p>
                <img class="auth__icono" src="img/info.svg" alt="Icono Info">
                <!-- Js -->
            </div>

            <form class="formulario" id="contacto-formulario">

                <div class="formulario__campo-contenedor">
                    <label for="name" class="formulario__label">Nombre</label>
                    <input type="text" placeholder="Tu Nombre" class="formulario__campo" id="name">
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="apellido" class="formulario__label">Apellido</label>
                    <input type="text" placeholder="Tu Apellido" class="formulario__campo" id="apellido">
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="telefono" class="formulario__label">Teléfono</label>
                    <input type="tel" placeholder="Ej: 2222 3333" class="formulario__campo" id="telefono">
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="email" class="formulario__label">Email</label>
                    <input type="email" placeholder="correo@correo.com" class="formulario__campo" id="email">
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="password" class="formulario__label">Password</label>
                    <input type="password" placeholder="Tu Password" class="formulario__campo" id="email">
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="password_confim" class="formulario__label">Repetir Password</label>
                    <input type="password_confim" placeholder="Repite tu Password" class="formulario__campo" id="email">
                </div>


                <input type="submit" class="formulario__enviar" value="Crear Cuenta">


            </form>

        </div>


    </main>

    <footer class="home__footer">
        <a href="<?php echo site_url('/contact') ?>" class="btn bg-verde ">Contacto</a>

        <p>&copy; Martin del Pino - <span><?php echo Date('Y'); ?></span></p>

    </footer>


</body>

</html>