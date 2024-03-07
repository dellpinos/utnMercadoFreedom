<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MFreedom</title>
    <link rel="icon" href="img/gift.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <header class="home__header">
        <div class="home__contenedor-header">
            <a href="/" class="home__logo">

                <img class="home__logo-icon" src="/img/logo.svg" alt="Icono logo">
                <h1><span>Mercado</span><span>Freedom</span></h1>

            </a>

            <div class="home__contenedor-nav-btn">
                <a href="<?php echo site_url('/register') ?>" class="btn">Sign Up</a>

                <a href="<?php echo site_url('/login') ?>" class="btn">Log in</a>
            </div>


        </div>
    </header>
    <?php if (isset($mensaje)) : ?>
        <p class="home__mensaje"><?php echo $mensaje ?></p>
    <?php endif ?>


    <main class="home__principal bg-white">

        <h2 class="auth__heading">Nuevo Usuario</h2>

        <div class="auth__contenedor">

            <div class="auth__contenedor-aux">
                <!-- <p class="auth__mensaje">Nuevo Usuario</p> -->
                <img class="auth__icono register__icono" src="img/register.svg" alt="Icono Info">
                <!-- Js -->
            </div>

            <form class="formulario" id="register-formulario">

                <div class="formulario__campo-contenedor">
                    <label for="register-name" class="formulario__label">Nombre</label>
                    <input type="text" placeholder="Tu Nombre" class="formulario__campo" id="register-name" name="name">
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="register-apellido" class="formulario__label">Apellido</label>
                    <input type="text" placeholder="Tu Apellido" class="formulario__campo" id="register-apellido" name="apellido">
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="register-telefono" class="formulario__label">Teléfono</label>
                    <input type="tel" placeholder="Ej: 2222 3333" class="formulario__campo" id="register-telefono" name="telefono">
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="register-email" class="formulario__label">Email</label>
                    <input type="email" placeholder="correo@correo.com" class="formulario__campo" id="register-email" name="email">
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="register-password" class="formulario__label">Password</label>
                    <input type="password" placeholder="Tu Password" class="formulario__campo" id="register-password" name="password">
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="register-password_confim" class="formulario__label">Repetir Password</label>
                    <input type="password" placeholder="Repite tu Password" class="formulario__campo" id="register-confirm_password" name="confirm_password">
                </div>


                <input type="submit" class="formulario__enviar" value="Crear Cuenta">


            </form>

        </div>


    </main>

    <footer class="home__footer">
        <a href="<?php echo site_url('/contact') ?>" class="btn bg-verde ">Contacto</a>

        <p>&copy; Martin del Pino - <span><?php echo Date('Y'); ?></span></p>

        <script src="assets/js/register.js"></script>

    </footer>


</body>

</html>