<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>productos</h1>
    <?php
    foreach ($productos as $p) {
    ?>
    <h2><?=$p->getNombre()?></h2>
    <h2><?=$p->getDesc()?></h2>
    <h2><?=$p->getPrecio()?></h2>
    <?php
    }
    ?>
</body>

</html>