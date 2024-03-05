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
                <a href="<?php echo site_url('/register') ?>" class="btn">Register</a>

                <a href="<?php echo site_url('/login') ?>" class="btn">Login</a>
            </div>


        </div>
    </header>
    <?php if (isset($mensaje)) : ?>
        <p class="home__mensaje"><?php echo $mensaje ?></p>
    <?php endif ?>


    <main class="home__principal bg-white">

        <h2 class="auth__heading">Login</h2>

        <div class="auth__contenedor">

            <div class="auth__contenedor-aux" id="contenedor-aux">
                <img class="auth__icono" src="img/login.svg" alt="Icono Info">
                <!-- Js -->
            </div>

            <form class="formulario" id="login-formulario" novalidate>

                <div class="formulario__campo-contenedor">
                    <label for="login-email" class="formulario__label">Email</label>
                    <input type="email" placeholder="correo@correo.com" class="formulario__campo" id="login-email">
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="login-password" class="formulario__label">Password</label>
                    <input type="password" placeholder="Tu Password" class="formulario__campo" id="login-password">
                </div>

                <input type="submit" class="formulario__enviar" value="Enviar">


            </form>

        </div>


    </main>

    <footer class="home__footer">
        <a href="<?php echo site_url('/contact') ?>" class="btn bg-verde ">Contacto</a>

        <p>&copy; Martin del Pino - <span><?php echo Date('Y'); ?></span></p>

        <script src="assets/js/login.js"></script>

    </footer>


</body>

</html>