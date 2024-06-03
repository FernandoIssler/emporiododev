<div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
    <div class="axil-product product-style-one">
        <div class="thumbnail">
            <a href="<?= url("/produto/{$product->id}") ?>">
                <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img" src="<?= $product->cover ? $product->cover : url(CONF_THEME . "/assets/images/product/electric/product-08.png"); ?>" alt="Product Images">
                <img class="hover-img" src="<?= $product->cover ? $product->cover : url(CONF_THEME . "/assets/images/product/electric/product-01.png"); ?>" alt="Product Images">
            </a>
            <div class="label-block label-right">

            </div>
            <div class="product-hover-action">
                <ul class="cart-action">
                    <li class="select-option">
                        <a href="<?= url("/produto/{$product->id}") ?>">
                            Adicionar ao carrinho
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-content">
            <div class="inner">
                <h5 class="title"><a href="<?= url("/produto/{$product->id}") ?>"><?= $product->title ?></a></h5>
                <div class="product-price-variant">
                    <span class="price current-price">R$ <?= str_price($product->price) ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Single Product  -->