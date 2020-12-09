<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0dc3b1d201.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="<?= URL ?>public/css/header.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/footer.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/carrito.css">
</head>

<body>
    <?php require_once 'views/templates/header.php'; ?>
    <div class="parent__container">
        <div class="child__container">
            <h1>Mi Carrito</h1>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($productos as $p) {
                    ?>
                        <tr>
                            
                            <td class="product-remove">
                                <form action="<?=URL?>cliente/eliminarproducto" method="post">
                                    <button class="remove" name="data" value="<?=$p->getId()?> <?=$_SESSION['cliente']->getDocumento()?>">x</button>
                                </form>
                            </td>
                            <td><img src="<?=$p->getImagen()?>" alt=""></td>
                            <td><a href="<?= URL ?>categoria/getproducto?id=<?=$p->getId()?>" class="title"><?=$p->getNombre()?></a></td>
                            <td><span>$<?=$p->getPrecio()?></span></td>
                            <td>
                                <div class="counter">
                                    <button class="subtract" disabled>-</button>
                                    <div><?=$p->getCantidad()?></div>
                                    <button>+</button>
                                </div>
                            </td>
                            <td><span>$<?=($p->getPrecio())*($p->getCantidad())?></span></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <table class="total__price">
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>$<?=$total?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php require_once 'views/templates/footer.php'; ?>
</body>

</html>