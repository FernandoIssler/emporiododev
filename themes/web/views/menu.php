<div id="axil-sticky-placeholder"></div>
<div class="axil-mainmenu">
    <div class="container">
        <div class="header-navbar">
            <div class="header-brand">
                <a href="<?= url() ?>" class="logo logo-dark">
                    <img src="<?= url("shared/assets/images/logo/logoEdD.png"); ?>" alt="Site Logo" width="160px">
                </a>
                <a href="<?= url() ?>" class="logo logo-light">
                    <img src="<?= url(CONF_THEME . "/assets/images/logo/logo-light.png"); ?>" alt="Site Logo" width="220px">
                </a>
            </div>
            <div class="header-main-nav">
                <!-- Start Mainmanu Nav -->
                <nav class="mainmenu-nav">
                    <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                    <div class="mobile-nav-brand">
                        <a href="<?= url() ?>" class="logo">
                            <img src="<?= url(CONF_THEME . "/assets/images/logo/logo-light.png"); ?>" alt="Site Logo" width="220px">
                        </a>
                    </div>
                    <ul class="mainmenu">
                        <li><a href="<?= url() ?>">Home</a></li>
                        <li><a href="<?= url("quemsomos") ?>">Quem somos</a></li>
                        <li><a href="<?= url("contato") ?>">Fale Conosco</a></li>
                    </ul>
                </nav>
                <!-- End Mainmanu Nav -->
            </div>
            <div class="header-action">
                <ul class="action-list">
                    <li class="my-account">
                        <a href="javascript:void(0)">
                            <i class="flaticon-person"></i>
                        </a>
                        <div class="my-account-dropdown">
                            <div class="login-btn">
                                <a href="<?= url("entrar"); ?>" class="axil-btn btn-bg-primary">Entrar</a>
                            </div>
                            <div class="reg-footer text-center">Ainda não tem conta?
                                <a href="<?= url("cadastrar") ?>" class="btn-link">Cadastrar</a></div>
                        </div>
                    </li>
                    <li class="axil-mobile-toggle">
                        <button class="menu-btn mobile-nav-toggler">
                            <i class="flaticon-menu-2"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>