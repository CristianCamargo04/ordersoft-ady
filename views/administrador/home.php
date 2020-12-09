<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ordersoft</title>
    <link rel="stylesheet" href="<?=URL?>public/css/footer.css">
    <link rel="stylesheet" href="<?=URL?>public/css/admin_product.css">
</head>

<body>
    <div class="wrapper">
    <?php require_once 'views/administrador/header-admin.php';?>
        <section class="container--register">
            <div class="container__content--register">
                <form class="container__content--formp">

                    <label class="data--lbl" for="user">Usuario</label>
                    <input class="data--inpt" type="text" placeholder="Nombre de usuario" name="user" required>
    
                    <label class="data--lbl" for="email">Correo</label>
                    <input class="data--inpt" type="email" placeholder="Correo electronico" name="email" required>
    
                    <label class="data--lbl" for="passw">Nueva Contraseña</label>
                    <input class="data--inpt" type="password" placeholder="Nueva contraseña" name="passw" required>
    
                    <label class="data--lbl" for="passw2">Confirmar Nueva Contraseña</label>
                    <input class="data--inpt" type="password" placeholder="Repita la nueva contraseña" name="passw2" required>

                    <button class="data--btn" type="submit">Actualizar Datos</button>
                </form>
            </div>
        </section>
    </div>
</body>

</html>