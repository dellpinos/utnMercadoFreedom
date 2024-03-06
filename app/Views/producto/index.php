<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MFreedom</title>
    <link rel="icon" href="/img/gift.png" type="image/x-icon">
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
                            <button class="btn bg-red" type="submit">Cerrar Sesión</button>
                        </form>
                    </div>
                </div>

            <?php else : ?>

                <div class="home__contenedor-nav-btn">
                    <a href="<?php echo site_url('/register') ?>" class="btn">Register</a>

                    <a href="<?php echo site_url('/login') ?>" class="btn">Login</a>
                </div>

            <?php endif ?>
        </div>
    </header>

    <div class="home__principal">

        <h2><?php echo $producto['nombre']; ?></h2>

        <div class="producto__contenedor-full">
            <h3 class="producto__precio">$ <?php echo floor($producto['precio']); ?></h3>

            <div class="producto__full-img">

                <?php if($producto['tipo'] === '1') : ?>
                    <img src="/img/shirts/<?php echo $producto['imagen'] ?>.jpg" alt="Imagen Producto">
                <?php elseif ($producto['tipo'] === '2') : ?>
                    <img src="/img/caps/<?php echo $producto['imagen'] ?>.webp" alt="Imagen Producto">
                <?php elseif ($producto['tipo'] === '3') : ?>
                    <img src="/img/sneakers/<?php echo $producto['imagen'] ?>.webp" alt="Imagen Producto">
                <?php endif ?>
                

            </div>
            <p class="producto__descripcion"><?php echo $producto['descripcion'] ?><span class="text-bold"><?php echo " #Cod: " . $producto['id'] ?></span></p>

            <div class="producto__contenedor-enlace">
                <?php $producto['stock'] <= 0 ? $agotado = true : $agotado = false; ?>
                <?php if (!$agotado) : ?>
                    <?php if ($user_data !== false) : ?>
                        <form action="<?php echo site_url('/producto/update') ?>" method="POST">

                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                            <button class="producto__btn text-xl" type="submit">Comprar</button>
                        </form>

                    <?php else : ?>
                        <a href="<?php echo site_url('/login') ?>" class="btn text-xl">Login</a>

                    <?php endif ?>
                    <p>Stock: <span><?php echo $producto['stock']; ?></span></p>

                <?php else : ?>
                    <p class="producto__agotado">Agotado</p>
                <?php endif ?>


            </div>
        </div>


    </div>

    <footer class="home__footer">
        <a href="<?php echo site_url('/contact') ?>" class="btn bg-verde ">Contacto</a>

        <p>&copy; Martin del Pino - <span><?php echo Date('Y'); ?></span></p>

    </footer>

</body>