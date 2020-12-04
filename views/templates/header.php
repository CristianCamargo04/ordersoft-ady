<header id="header">
        <div class="header__container list__content">
            <div class="h__container--logosearch">
                <div class="logosearch">
                    <a href="<?=URL?>" class="logo">OrderSoft</a>
                    <div class="search">
                        <form class="search__f">
                            <input class="search__f--input" type="text" name="search"
                                placeholder="Burger, hot dog, sandwich...">
                        </form>
                        <span class="search--icon material-icons md-18">search</span>
                    </div>
                </div>
            </div>
            <ul class="list__ul">
                <?php 
                    if (!isset($_SESSION['cliente'])) {
                ?>
                        <li class="list__ul__li"><button class="login--btn cart--icon" onclick="openModal()">Login</button></li>
                <?php 
                    }else{
                ?>     
                        <li class="list__ul__li"><a class="list__ul__li--a" href="<?=URL?>cliente/home"><?=$_SESSION['cliente']->getNombres()?></a></li>
                        <li class="list__ul__li"><a class="list__ul__li--a" href="<?=URL?>cliente/cerrar">Cerrar sesión</a></li>
                <?php 
                    }
                ?>
                <li class="list__ul__li">
                    <div class="icon">
                        <a class="list__ul__li--a">Categorias</a>
                        <div class="modal__cart">
                            <div class="modal__cart__content">
                                <ul>
                                    <?php
                                        foreach ($categorias as $c) {
                                    ?>
                                    <li>
                                        <a href="<?= URL ?>categoria/listar?id=<?= $c->getId() ?>"><?= $c->getNombre() ?></a>
                                    </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list__ul__li"><a class="list__ul__li--a" href="#">Preguntas</a></li>
                <li class="list__ul__li"><a class="list__ul__li--a" href="#">Contacto</a></li>
                <?php 
                    if (!isset($_SESSION['cliente'])) {
                ?>
                    <li class="list__ul__li"><a class="list__ul__li--a" onclick="openModal()"><span class="material-icons cart--icon">shopping_cart</span></a></li>
                <?php 
                    }else{
                ?>     
                    <li class="list__ul__li">
                        <form class="form__button" action="<?=URL?>cliente/carrito" method="post">
                            <button class="login--btn cart--icon" name="id_carrito" value="<?=$_SESSION['cliente']->getDocumento()?>">
                                <span class="material-icons cart--icon">shopping_cart</span>
                            </button>
                        </form>
                    </li>
                <?php 
                    }
                ?>
                
            </ul>
                
        </div>
</header>