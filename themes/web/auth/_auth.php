<!DOCTYPE html>

<html
        lang="pt-br"
        class="light-style layout-wide customizer-hide"
        dir="ltr"
        data-theme="theme-default"
        data-assets-path="<?= url(CONF_THEME_3 . "/assets/") ?>"
        data-template="horizontal-menu-template-no-customizer">
<head>

    <?= $head ?>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= url() ?>/shared/assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= url() ?>/shared/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= url() ?>/shared/assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= url() ?>/shared/assets/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= url() ?>/shared/assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

    <!-- Icons -->
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/fonts/boxicons.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/fonts/fontawesome.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/fonts/flag-icons.css") ?>"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/css/rtl/core.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/css/rtl/theme-default.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/css/demo.css") ?>"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/libs/typeahead-js/typeahead.css") ?>"/>

    <!-- Vendor -->
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/libs/@form-validation/umd/styles/index.min.css") ?>"/>

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/css/pages/page-auth.css") ?>"/>

    <!-- Helpers -->
    <script src="<?= url(CONF_THEME_3 . "/assets/vendor/js/helpers.js") ?>"></script>
    <!-- Config -->
    <script src="<?= url(CONF_THEME_3 . "/assets/js/config.js") ?>"></script>

    <!-- Custom -->
    <link href="<?= url("shared/assets/css/custom.css") ?>" rel="stylesheet" type="text/css"/>
</head>

<body>
<!-- Content -->

<div id="url-global" data-url="<?= url() ?>"></div>
<div id="alert-flash" class="d-none"><?= flash() ?></div>
<div id="alert-container-toast" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 999999 !important;"></div>

<div class="authentication-wrapper authentication-cover auth-bg-cover">
    <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-top mt-5">
            <div class="flex-row text-center mx-auto text-white">

                <div class="mx-auto">
                    <h3 class="text-white">"<span class="fst-italic text-white">Não curtimos tecnologia, a
                            respiramos</span>"</h3>
                    <p>
                        Empório do DEV, sempre com você.
                    </p>
                </div>
            </div>
        </div>
        <!-- /Left Text -->

        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->
                <div class="app-brand mb-4">
                    <a href="index.html" class="app-brand-link gap-2 mb-2">
                        <span class="app-brand-logo demo" style="width: 150px; height: 50px;">
                            <img src="<?= url("shared/assets/images/logo/logoEdD.png"); ?>" width="150px" alt="<?= CONF_SITE_NAME ?>">
                        </span>
                        <span class="app-brand-text demo h3 mb-0 fw-bold"></span>
                    </a>
                </div>
                <p class="text-danger">Todo o painel de usuário será acessado como <b>administrador</b>.</p>
                <!-- /Logo -->
                <?= $this->section("content"); ?>
            </div>
        </div>
    </div>
</div>

<!-- / Content -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/jquery/jquery.js") ?>"></script>
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/popper/popper.js") ?>"></script>
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/js/bootstrap.js") ?>"></script>
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js") ?>"></script>
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/hammer/hammer.js") ?>"></script>
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/i18n/i18n.js") ?>"></script>
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/typeahead-js/typeahead.js") ?>"></script>
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/js/menu.js") ?>"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js") ?>"></script>
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js") ?>"></script>
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js") ?>"></script>

<!-- Main JS -->
<script src="<?= url(CONF_THEME_3 . "/assets/js/main.js") ?>"></script>

<!-- Page JS -->
<script src="<?= url(CONF_THEME_3 . "/assets/js/pages-auth.js") ?>"></script>

<?= $this->section("scripts"); ?>

<script src="<?= url("shared/assets/js/custom.js") ?>"></script>

</body>
</html>
