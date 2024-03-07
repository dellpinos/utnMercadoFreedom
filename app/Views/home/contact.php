<!DOCTYPE html>
<html lang="es">

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

            <?php if ($user_data !== false) : ?>

                <div class="home__nav">
                    <p class="home__nombre"><span>Hola: </span><?php echo $user_data['nombre'] ?></p>

                    <div class="home__contenedor-nav-btn">

                        <form action="<?php echo site_url('/producto/sumar_stock') ?>" method="POST">
                            <button class="btn" type="submit">Reponer Stock</button>
                        </form>
                        <form action="<?php echo site_url('/producto/vender_todo') ?>" method="POST">
                            <button class="btn bg-red" type="submit">Vender Todo</button>
                        </form>
                        <form action="<?php echo site_url('/logout') ?>" method="POST">
                            <button class="btn bg-red" type="submit">Log out</button>
                        </form>
                    </div>
                </div>

            <?php else : ?>

                <div class="home__contenedor-nav-btn">
                    <a href="<?php echo site_url('/register') ?>" class="btn">Sign Up</a>

                    <a href="<?php echo site_url('/login') ?>" class="btn">Log in</a>
                </div>

            <?php endif ?>
        </div>
    </header>
    <?php if (isset($mensaje)) : ?>
        <p class="home__mensaje"><?php echo $mensaje ?></p>
    <?php endif ?>

    <main class="home__principal bg-white">
        <h2 class="auth__heading">Contacto</h2>

        <div class="contacto__contenedor">

            <div class="auth__contenedor-aux" id="contenedor-aux">
                <p class="auth__mensaje">Todos los campos son obligatorios</p>
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
                    <label for="tipo" class="formulario__label">Tipo de Contacto</label>
                    <select id="tipo" class="formulario__campo">
                        <option selected disabled>-- Seleccionar --</option>
                        <option value="1">Soporte</option>
                        <option value="2">Ventas</option>
                    </select>
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="asunto" class="formulario__label">Asunto</label>
                    <input type="text" placeholder="Asunto" class="formulario__campo" id="asunto">
                </div>

                <div class="formulario__campo-contenedor">
                    <label for="descripcion" class="formulario__label">Descripción</label>
                    <textarea class="formulario__campo" id="descripcion"></textarea>
                </div>

                <input type="submit" class="formulario__enviar" value="Enviar">


            </form>

        </div>


    </main>

    <footer class="home__footer">

        <p>&copy; Martin del Pino - <span><?php echo Date('Y'); ?></span></p>

        <script src="assets/js/contacto.js"></script>
    </footer>


</body>

</html>