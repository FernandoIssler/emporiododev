<!doctype html>
<html class="no-js" lang="pt-br">

<head>

    <?= $head ?>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="noindex, follow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= url("shared/assets/images/favicon.png"); ?>">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= url(CONF_THEME . "/assets/css/vendor/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= url(CONF_THEME . "/assets/css/vendor/font-awesome.css"); ?>">
    <link rel="stylesheet" href="<?= url(CONF_THEME . "/assets/css/vendor/flaticon/flaticon.css"); ?>">
    <link rel="stylesheet" href="<?= url(CONF_THEME . "/assets/css/vendor/slick.css"); ?>">
    <link rel="stylesheet" href="<?= url(CONF_THEME . "/assets/css/vendor/slick-theme.css"); ?>">
    <link rel="stylesheet" href="<?= url(CONF_THEME . "/assets/css/vendor/jquery-ui.min.css"); ?>">
    <link rel="stylesheet" href="<?= url(CONF_THEME . "/assets/css/vendor/sal.css"); ?>">
    <link rel="stylesheet" href="<?= url(CONF_THEME . "/assets/css/vendor/magnific-popup.css"); ?>">
    <link rel="stylesheet" href="<?= url(CONF_THEME . "/assets/css/vendor/base.css"); ?>">
    <link rel="stylesheet" href="<?= url(CONF_THEME . "/assets/css/style.min.css"); ?>">

    <link href="<?= url("shared/assets/css/custom.css") ?>" rel="stylesheet" type="text/css"/>

</head>


<body class="sticky-header newsletter-popup-modal">

<div class="loader" style="z-index:999999999 !important;">
    <div class="loader-spinner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<div id="url-global" data-url="<?= url() ?>"></div>
<div id="alert-flash" class="d-none"><?= flash() ?></div>
<div id="alert-container-toast" class="toast-container position-fixed top-0 end-0 p-3"></div>

<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->
<a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
<header class="header axil-header header-style-1">
    <div class="header-top-campaign">
        <div class="container position-relative">
            <div class="campaign-content">
                <p>Aproveite as promoções de <a href="#">inauguração</a></p>
            </div>
        </div>
        <button class="remove-campaign"><i class="fal fa-times"></i></button>
    </div>
    <div class="axil-header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="header-top-link">
                        <ul class="quick-link">
                            <li><a href="<?= url("entrar") ?>">Entrar</a></li>
                            <li><a href="<?= url("cadastrar") ?>">Cadastrar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Mainmenu Area  -->
    <?= $this->insert("views/menu"); ?>
    <!-- End Mainmenu Area -->
</header>

<main class="main-wrapper">
    <!-- Start Shop Area  -->
    <div class="axil-single-product-area bg-color-white">
        <div class="single-product-thumb axil-section-gap pb--20 pb_sm--0 bg-vista-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb--40">
                        <div class="row">
                            <div class="col-lg-10 order-lg-2">
                                <div class="single-product-thumbnail-wrap zoom-gallery">
                                    <div class="product-large-thumbnail single-product-thumbnail axil-product">
                                        <div class="thumbnail">
                                            <a href="<?= $product->cover ?>" class="popup-zoom">
                                                <img src="<?= $product->cover ?>" alt="Product Images">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="label-block">
                                        <div class="product-badget">OFERTA IMPERDÍVEL</div>
                                    </div>
                                    <div class="product-quick-view position-view">
                                        <a href="<?= $product->cover ?>" class="popup-zoom">
                                            <i class="far fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 order-lg-1">
                                <div class="product-small-thumb small-thumb-wrapper small-thumb-style-two">
                                    <div class="small-thumb-img ">
                                        <img src="<?= $product->cover ?>" alt="thumb image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb--40">
                        <div class="single-product-content">
                            <div class="inner">
                                <h2 class="product-title"><?= $product->title ?></h2>
                                <span class="price-amount"><small>R$</small> <?= str_price($product->price) ?></span>
                                <ul class="product-meta">
                                    <li><i class="fal fa-check"></i>Em estoque</li>
                                    <li><i class="fal fa-check"></i>Entrega grátis</li>
                                </ul>
                                <p class="description"><?= $product->description ?></p>

                                <p class="text-danger small">As funcionalidades abaixo não estão implementadas.</p>

                                <!-- Start Product Action Wrapper  -->
                                <div class="product-action-wrapper d-flex-center">
                                    <!-- Start Quentity Action  -->
                                    <div class="pro-qty mr--20"><input type="text" value="1"></div>
                                    <!-- End Quentity Action  -->

                                    <!-- Start Product Action  -->
                                    <ul class="product-action d-flex-center mb--0">
                                        <li class="add-to-cart"><a href="cart.html" class="axil-btn btn-bg-primary">Comprar</a>
                                        </li>
                                        <li class="wishlist">
                                            <a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                    <!-- End Product Action  -->

                                </div>
                                <!-- End Product Action Wrapper  -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .single-product-thumb -->

    </div>
    <!-- End Shop Area  -->

    <!-- Start Recently Viewed Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> Outros
                    produtos</span>
                <h2 class="title">Mais vendidos</h2>
            </div>
            <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                <?php foreach ($others as $other): ?>
                    <div class="slick-single-layout">

                        <div class="axil-product">
                            <div class="thumbnail">
                                <a href="<?= url("produto/{$other->id}") ?>">
                                    <img src="<?= $other->cover ?>" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option">
                                            <a href="<?= url("produto/{$other->id}") ?>">Comprar</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title">
                                        <a href="<?= url("produto/{$other->id}") ?>"><?= $other->title ?></a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">R$ <?= str_price($other->price) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- End Recently Viewed Product Area  -->
    <!-- Start Axil Newsletter Area  -->
    <div class="axil-newsletter-area axil-section-gap pt--0">
        <div class="container">
            <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                <div class="newsletter-content">
                    <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                    <h2 class="title mb--40 mb_sm--30">Seja o <span class="text-primary">PRIMEIRO</span> a saber</h2>
                    <form action="<?= url("newsletter") ?>" method="post">
                        <div id="alert-container-fixed"></div>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="exemplo@gmail.com" type="text" name="email">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Assinar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Axil Newsletter Area  -->
</main>


<div class="service-area">
    <div class="container">
        <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="<?= url(CONF_THEME . "/assets/images/icons/service1.png"); ?>" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Entrega rápida e segura</h6>
                        <p>O envio mais rápido do Brasil</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="<?= url(CONF_THEME . "/assets/images/icons/service2.png"); ?>" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Garantia</h6>
                        <p>Garantimos a qualidade de nossos podutos</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="<?= url(CONF_THEME . "/assets/images/icons/service3.png"); ?>" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">7 dias para troca</h6>
                        <p>Se não gostar é so mandar de volta</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="<?= url(CONF_THEME . "/assets/images/icons/service4.png"); ?>" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Suporte 24x6</h6>
                        <p>Só não atendemos aos sábados</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Footer Area  -->
<footer class="axil-footer-area footer-style-2">
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-default separator-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4">
                    <div class="social-share">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-discord"></i></a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="copyright-left d-flex flex-wrap justify-content-center">
                        <ul class="quick-link">
                            <li>© 2024. Todos os direitos reservados
                                <a target="_blank" href="https://www.isslerweb.com.br/">IsslerWeb</a>.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
</footer>
<!-- End Footer Area  -->

<!-- Header Search Modal End -->
<?= $this->insert("views/modals/search"); ?>
<!-- Header Search Modal End -->


<div class="cart-dropdown" id="cart-dropdown">
    <div class="cart-content-wrap">
        <div class="cart-header">
            <h2 class="header-title">Carrrinho de compras</h2>
            <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
        </div>
        <div class="cart-body">
            <ul class="cart-item-list">
                <li class="cart-item">
                    <div class="item-img">
                        <a href="single-product.html"><img src="assets/images/product/electric/product-01.png" alt="Commodo Blown Lamp"></a>
                        <button class="close-btn"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="item-content">
                        <div class="product-rating">
                            <span class="icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="rating-number">(64)</span>
                        </div>
                        <h3 class="item-title"><a href="single-product-3.html">Wireless PS Handler</a></h3>
                        <div class="item-price"><span class="currency-symbol">$</span>155.00</div>
                        <div class="pro-qty item-quantity">
                            <input type="number" class="quantity-input" value="15">
                        </div>
                    </div>
                </li>
                <li class="cart-item">
                    <div class="item-img">
                        <a href="single-product-2.html"><img src="assets/images/product/electric/product-02.png" alt="Commodo Blown Lamp"></a>
                        <button class="close-btn"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="item-content">
                        <div class="product-rating">
                            <span class="icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="rating-number">(4)</span>
                        </div>
                        <h3 class="item-title"><a href="single-product-2.html">Gradient Light Keyboard</a></h3>
                        <div class="item-price"><span class="currency-symbol">$</span>255.00</div>
                        <div class="pro-qty item-quantity">
                            <input type="number" class="quantity-input" value="5">
                        </div>
                    </div>
                </li>
                <li class="cart-item">
                    <div class="item-img">
                        <a href="single-product-3.html"><img src="assets/images/product/electric/product-03.png" alt="Commodo Blown Lamp"></a>
                        <button class="close-btn"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="item-content">
                        <div class="product-rating">
                            <span class="icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="rating-number">(6)</span>
                        </div>
                        <h3 class="item-title"><a href="single-product.html">HD CC Camera</a></h3>
                        <div class="item-price"><span class="currency-symbol">$</span>200.00</div>
                        <div class="pro-qty item-quantity">
                            <input type="number" class="quantity-input" value="100">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="cart-footer">
            <h3 class="cart-subtotal">
                <span class="subtotal-title">Subtotal:</span>
                <span class="subtotal-amount">$610.00</span>
            </h3>
            <div class="group-btn">
                <a href="cart.html" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
                <a href="checkout.html" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
            </div>
        </div>
    </div>
</div>

<!-- Offer Modal Start -->
<div class="offer-popup-modal" id="offer-popup-modal">
    <div class="offer-popup-wrap">
        <div class="card-body">
            <button class="popup-close"><i class="fas fa-times"></i></button>
            <div class="content">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Don’t
                        Miss!!</span>
                    <h3 class="title">Best Sales Offer<br> Grab Yours</h3>
                </div>
                <div class="poster-countdown countdown"></div>
                <a href="shop.html" class="axil-btn btn-bg-primary">Shop Now <i class="fal fa-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="closeMask"></div>
<!-- Offer Modal End -->
<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="<?= url(CONF_THEME . "/assets/js/vendor/modernizr.min.js"); ?>"></script>
<!-- jQuery JS -->
<script src="<?= url(CONF_THEME . "/assets/js/vendor/jquery.js"); ?>"></script>
<!-- Bootstrap JS -->
<script src="<?= url(CONF_THEME . "/assets/js/vendor/popper.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/js/vendor/bootstrap.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/js/vendor/slick.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/js/vendor/js.cookie.js"); ?>"></script>
<!-- <script src="<?= url(CONF_THEME . "/assets/js/vendor/jquery.style.switcher.js"); ?>"></script> -->
<script src="<?= url(CONF_THEME . "/assets/js/vendor/jquery-ui.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/js/vendor/jquery.ui.touch-punch.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/js/vendor/jquery.countdown.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/js/vendor/sal.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/js/vendor/jquery.magnific-popup.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/js/vendor/imagesloaded.pkgd.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/js/vendor/isotope.pkgd.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/js/vendor/counterup.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/js/vendor/waypoints.min.js"); ?>"></script>

<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/toastr/toastr.js") ?>"></script>

<!-- Main JS -->
<script src="<?= url(CONF_THEME . "/assets/js/main.js"); ?>"></script>

<script src="<?= url("shared/assets/js/custom.js") ?>"></script>

</body>

</html>