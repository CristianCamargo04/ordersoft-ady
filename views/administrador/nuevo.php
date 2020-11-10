<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="<?=URL?>public/css/admin_product.css">
    <link rel="stylesheet" href="<?=URL?>public/css/footer.css">
</head>

<body>
    <header id="header">
        <div class="header__container list__content">
            <div class="h__container--logosearch">
                <div class="logosearch">
                    <a href="<?=URL?>" class="logo">OrderSoft</a>
                </div>
            </div>
            <ul class="list__ul">
                <li class="list__ul__li"><a class="list__ul__li--a" href="<?=URL?>administrador/nuevo">Nuevo</a></li>
                <li class="list__ul__li"><a class="list__ul__li--a" href="#">Productos</a></li>
                <li class="list__ul__li"><a class="list__ul__li--a" href="<?=URL?>administrador/home">Perfil</a></li>
            </ul>
        </div>
    </header>
    <section class="container--register">
        <div class="container__content--register">
            <form class="container__content--form" enctype="multipart/form-data">
                <div class="data">
                    <label class="data--lbl" for="nombre">Nombre</label>
                    <input class="data--inpt" type="text" placeholder="Nombre del producto" name="nombre" required>

                    <label class="data--lbl" for="desc">Descripción</label>
                    <textarea class="data--txt" name="desc" rows="9" cols="50" placeholder="Descripción del producto" required></textarea>

                    <label class="data--lbl" for="categoria">Categoria</label>
                    <select class="data--inpt" name="categoria">
                        <option value="1">Hamburguesa</option> 
                        <option value="2" selected>Hot dog</option>
                        <option value="3">Sandwich</option>
                    </select>

                    <label class="data--lbl" for="precio">Precio</label>
                    <input class="data--inpt" type="number" step="1000" min="0" placeholder="Precio del producto" name="precio" required>

                    
                </div>
                <div class="f__content--register">
                    <label class="data--lbl" for="c-imagen">Imagen del Producto</label>
                    <img id="preview" src="" alt="Imagen del producto" name="c-imagen">
                    <input type="file" name="imagen" id="file" accept=".jpg,.png,.tiff,.psd,.bmp,.eps,.svg" onchange="previewImage();"/>
                    <button class="data--btn" type="submit">Registar Producto</button>
                </div>
            </form>
        </div>
    </section>
    <?php require_once 'views/templates/footer.php';?>
    <script src="<?=URL?>public/js/preloadImage.js"></script>
</body>

</html>