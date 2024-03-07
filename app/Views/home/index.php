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

    <main class="home__principal">

        <h2>Remeras</h2>

        <div class="home__grid">
            <?php foreach ($shirts as $producto) : ?>

                <?php $producto['stock'] <= 0 ? $agotado = true : $agotado = false; ?>

                <div class="producto__contenedor">
                    <h3 class="producto__contenedor-heading"><?php echo $producto['nombre'] ?></h3>
                    <div class="producto__contenedor-img">
                        <img src="img/shirts/<?php echo $producto['imagen'] ?>.jpg" alt="Imagen Producto">

                    </div>
                    <div>
                        <p class="producto__descripcion"><?php echo $producto['descripcion'] ?><span class="text-bold"><?php echo " #Cod: " . $producto['id'] ?></span></p>
                        <div class="producto__contenedor-enlace">
                            <?php if (!$agotado) : ?>
                                <a class="producto__btn" href="<?php echo site_url('producto/' . $producto['id']) ?>">Ver Detalles</a>
                                <p>Stock: <span><?php echo $producto['stock'] ?></span></p>

                            <?php else : ?>
                                <p class="producto__agotado">Agotado</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="home__divisor">
            <h2>12 cuotas sin interes en todos nuestros productos</h2>
            <div class="home__divisor-grid">
                <img class="home__logo-icon" src="/img/cap.svg" alt="Icono logo">
                <img class="home__logo-icon" src="/img/shirt-fashion.svg" alt="Icono logo">
                <img class="home__logo-icon" src="/img/sneakers.svg" alt="Icono logo">
                <img class="home__logo-icon" src="/img/shirt.svg" alt="Icono logo">
            </div>
        </div>


        <h2>Calzado</h2>

        <div class="home__grid">
            <?php foreach ($sneakers as $producto) : ?>

                <?php $producto['stock'] <= 0 ? $agotado = true : $agotado = false; ?>

                <div class="producto__contenedor">
                    <h3 class="producto__contenedor-heading"><?php echo $producto['nombre'] ?></h3>
                    <div class="producto__contenedor-img">
                        <img src="img/sneakers/<?php echo $producto['imagen'] ?>.webp" alt="Imagen Producto">

                    </div>
                    <div>
                        <p class="producto__descripcion"><?php echo $producto['descripcion'] ?><span class="text-bold"><?php echo " #Cod: " . $producto['id'] ?></span></p>
                        <div class="producto__contenedor-enlace">
                            <?php if (!$agotado) : ?>
                                <a class="producto__btn" href="<?php echo site_url('producto/' . $producto['id']) ?>">Ver Detalles</a>
                                <p>Stock: <span><?php echo $producto['stock'] ?></span></p>

                            <?php else : ?>
                                <p class="producto__agotado">Agotado</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="home__divisor">
            <h2>Envios a Domicilio</h2>
            <div class="home__divisor-grid">
                <img class="home__logo-icon" src="/img/hat.svg" alt="Icono logo">
                <img class="home__logo-icon" src="/img/shirt2.svg" alt="Icono logo">
                <img class="home__logo-icon" src="/img/lenses.svg" alt="Icono logo">
                <img class="home__logo-icon" src="/img/shirt3.svg" alt="Icono logo">
            </div>
        </div>

        <h2>Gorras</h2>

        <div class="home__grid">
            <?php foreach ($caps as $producto) : ?>

                <?php $producto['stock'] <= 0 ? $agotado = true : $agotado = false; ?>

                <div class="producto__contenedor">
                    <h3 class="producto__contenedor-heading"><?php echo $producto['nombre'] ?></h3>
                    <div class="producto__contenedor-img">
                        <img src="img/caps/<?php echo $producto['imagen'] ?>.webp" alt="Imagen Producto">

                    </div>
                    <div>
                        <p class="producto__descripcion"><?php echo $producto['descripcion'] ?><span class="text-bold"><?php echo " #Cod: " . $producto['id'] ?></span></p>
                        <div class="producto__contenedor-enlace">
                            <?php if (!$agotado) : ?>
                                <a class="producto__btn" href="<?php echo site_url('producto/' . $producto['id']) ?>">Ver Detalles</a>
                                <p>Stock: <span><?php echo $producto['stock'] ?></span></p>

                            <?php else : ?>
                                <p class="producto__agotado">Agotado</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="home__footer">
        <a href="<?php echo site_url('/contact') ?>" class="btn bg-verde ">Contacto</a>

        <p>&copy; Martin del Pino - <span><?php echo Date('Y'); ?></span></p>

    </footer>


</body>

</html>