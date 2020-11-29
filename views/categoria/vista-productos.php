<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ordersoft</title>
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0dc3b1d201.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="<?= URL ?>public/css/header.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/footer.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/style.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/products.css">
</head>

<body>
    <?php require_once 'views/templates/header.php'; ?>
    <?php require_once 'views/templates/modales.php'; ?>
    <section class="main__container">
        <aside class="aside">
            <h2>Categorias</h2>
            <ul>
                <?php
                foreach ($categorias as $c) {
                ?>
                    <li class="f__li">
                        <a class="f__li--a" href="<?= URL ?>categoria/listar?id=<?= $c->getId() ?>"><?= $c->getNombre() ?></a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <h2>Precio</h2>
            <form class="form-price">
                <input type="number" min="0" placeholder="Desde $">
                <input type="number" min="0" placeholder="Hasta $">
                <button type="button">Filtrar</button>
            </form>
        </aside>
        <article class="list__products">
            <?php
            foreach ($productos as $p) {
            ?>
                <div class="container__products">
                    <div class="container__products--details">
                        <img class="container__products--img" src="<?= $p->getImagen() ?>" alt="Producto">
                        <div class="container__products--title">
                            <p><?= $p->getNombre() ?></p>
                            <span>$<?= $p->getPrecio() ?></span>
                        </div>
                    </div>
                    <div class="container__products--options">
                        <span><?= $p->getDesc() ?></span>
                        <form action="<?= URL ?>categoria/getproducto" method="post">
                            <button name="id_producto" value="<?= $p->getId() ?>">Ver Producto</button>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </article>
    </section>

    <?php require_once 'views/templates/footer.php'; ?>
    <script src="<?= URL ?>public/js/app.js"></script>
</body>

</html>