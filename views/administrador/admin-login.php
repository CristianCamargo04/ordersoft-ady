<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="<?=URL?>public/css/admin.css">
</head>
<body>
    <main class="a_container">
        <div class="a_container__login">
            <form class="admin__form">
                <label class="admin__form--lbl" for="email">Usuario</label>
                <input class="admin__form--inpt" type="email" placeholder="Correo electronico" name="user">
                <label class="admin__form--lbl" for="email">Email</label>
                <input class="admin__form--inpt" type="email" placeholder="Correo electronico" name="email">
                <label class="admin__form--lbl" for="passw">Contraseña</label>
                <input class="admin__form--inpt" type="password" placeholder="Contraseña" name="contraseña">
                <a class="form--btn" href="<?=URL?>administrador/home">Iniciar sesion</a>
                <!-- <button class="form--btn" type="button">Iniciar sesion</button> -->
            </form>    
        </div>
    </main>
</body>
</html>