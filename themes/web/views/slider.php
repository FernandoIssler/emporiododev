<div class="axil-main-slider-area main-slider-style-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-sm-6">
                <div class="main-slider-content">
                    <div class="slider-content-activation-one">
                        <?php foreach ($sliders as $slider): ?>
                            <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="400" data-sal-duration="800">
                                <span class="subtitle"><i class="fas fa-fire"></i> Mais vendidos da semana</span>
                                <h1 class="title"><?= $slider->title ?></h1>
                                <div class="slide-action">
                                    <div class="shop-btn">
                                        <a href="<?= url("produto/{$slider->id}") ?>" class="axil-btn btn-bg-white"><i class="fal fa-shopping-cart"></i>Comprar</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-sm-6">
                <div class="main-slider-large-thumb">
                    <div class="slider-thumb-activation-one axil-slick-dots">
                        <?php foreach ($sliders as $slider): ?>
                            <div class="single-slide slick-slide" data-sal="slide-up" data-sal-delay="600" data-sal-duration="1500">
                                <img src="<?= $slider->cover ? $slider->cover : url(CONF_THEME . "/assets/images/product/electric/product-01.png"); ?>" style="mix-blend-mode: multiply !important;" alt="Product">
                                <div class="product-price">
                                    <span class="text">Apenas</span>
                                    <span class="price-amount">R$ <?= str_price($slider->price) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="shape-group">
        <li class="shape-1"><img src="assets/images/others/shape-1.png" alt="Shape"></li>
        <li class="shape-2"><img src="assets/images/others/shape-2.png" alt="Shape"></li>
    </ul>
</div>