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
            <div class="home__contenedor-stock-btn">
                <form action="<?php echo site_url('/producto/sumar_stock') ?>" method="POST">
                    <button class="home__stock-btn" type="submit">Reponer Stock</button>
                </form>
                <form action="<?php echo site_url('/producto/vender_todo') ?>" method="POST">
                    <button class="home__stock-btn bg-red" type="submit">Vender Todo</button>
                </form>
            </div>



        </div>
    </header>
    <?php if (isset($mensaje)) : ?>
        <p class="home__mensaje"><?php echo $mensaje ?></p>
    <?php endif ?>


    <main class="home__principal">

        <h2>Tenemos todos los talles!</h2>

        <div class="home__grid">
            <?php foreach ($productos as $producto) : ?>

                <?php $producto['stock'] <= 0 ? $agotado = true : $agotado = false; ?>

                <div class="producto__contenedor">
                    <h3 class="producto__contenedor-heading"><?php echo $producto['nombre'] ?></h3>
                    <div class="producto__contenedor-img">
                        <img src="img/<?php echo $producto['imagen'] ?>.jpg" alt="Imagen Producto">

                    </div>
                    <p class="producto__descripcion"><?php echo $producto['descripcion']?><span class="text-bold"><?php echo " #Cod: " . $producto['id'] ?></span></p>
                    <div class="producto__contenedor-enlace">
                        <?php if (!$agotado) : ?>
                            <a class="producto__btn" href="<?php echo site_url('producto/' . $producto['id']) ?>">Ver Detalles</a>
                            <p>Stock: <span><?php echo $producto['stock'] ?></span></p>

                        <?php else : ?>
                            <p class="producto__agotado">Agotado</p>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </main>

    <footer class="home__footer">
        <p>&copy; Martin del Pino - <span><?php echo Date('Y'); ?></span></p>


    </footer>


</body>

</html>