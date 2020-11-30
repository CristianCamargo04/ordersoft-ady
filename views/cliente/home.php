<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<p>
    Hola bienvenido <?php echo $_SESSION["cliente"]; ?>
</p>

<a href="<?=URL?>cliente/cerrar">Cerrar sesión</a>

</body>
</html>

