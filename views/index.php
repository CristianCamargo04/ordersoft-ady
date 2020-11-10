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
    <link rel="stylesheet" href="<?=URL?>public/css/header.css">
    <link rel="stylesheet" href="<?=URL?>public/css/footer.css">
    <link rel="stylesheet" href="<?=URL?>public/css/style.css">
</head>
<body>
    <?php require_once 'views/templates/header.php';?>
    <?php require_once 'views/templates/modales.php';?>
    
    <section class="banner">
        <div class="imgBx">
            <img src="<?=URL?>public/img/img1-medium.jpg" class="active">
            <img src="<?=URL?>public/img/img2-medium.jpg">
            <img src="<?=URL?>public/img/img3-medium.jpg">
            <img src="<?=URL?>public/img/img4-medium.jpg">
        </div>
        <div class="contentBx">
            <div class="active">
                <h2>Producto 1</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis recusandae a incidunt cupiditate?
                    Veniam, numquam?</p>
                <a href="#">Mas información</a>
            </div>
            <div>
                <h2>Producto 2</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis recusandae a incidunt cupiditate?
                    Veniam, numquam?</p>
                <a href="#">Mas información</a>
            </div>
            <div>
                <h2>Producto 3</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis recusandae a incidunt cupiditate?
                    Veniam, numquam?</p>
                <a href="#">Mas información</a>
            </div>
            <div>
                <h2>Producto 4</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis recusandae a incidunt cupiditate?
                    Veniam, numquam?</p>
                <a href="#">Mas información</a>
            </div>
        </div>
        <div class="controlIzq">
            <span class="material-icons md-24" onclick="prevSlide();prevSlideText();">arrow_back_ios</span>
        </div>
        <div class="controlDer">
            <span class="material-icons md-24" onclick="nextSlide();nextSlideText();">arrow_forward_ios</span>
        </ul>
    </section>
    <?php require_once 'views/templates/footer.php';?>
    <script src="<?=URL?>public/js/app.js"></script>
</body>
</html>