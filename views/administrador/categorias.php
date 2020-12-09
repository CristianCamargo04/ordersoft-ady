<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0dc3b1d201.js" crossorigin="anonymous"></script>
    <!-- styles -->
    <link rel="stylesheet" href="<?= URL ?>public/css/category.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/footer.css">
</head>

<body>
    <?php require_once 'views/administrador/header-admin.php'; ?>
    <section class="container__category">
        <div class="register__category">
            <form action="<?= URL ?>categoria/registrar" method="POST">
                <label class="data--lbl" for="nombre">Nombre</label>
                <input class="data--inpt" type="text" placeholder="Nombre de la Categoria" name="nombre" required>
                <button class="category--btn">Agregar Categoria</button>
            </form>
        </div>
        <table class="table__content">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($categorias as $c) {
                ?>
                    <tr>
                        <td><?= $c->getNombre() ?></td>
                        <td>
                            <a href="<?= URL ?>categoria/eliminar?id=<?= $c->getId() ?>"><span class="material-icons action-icon">delete</span></a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </section>
</body>

</html>