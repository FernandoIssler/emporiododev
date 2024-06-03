<!DOCTYPE html>

<html
        lang="pt-br"
        class="light-style layout-menu-fixed layout-compact"
        dir="ltr"
        data-theme="theme-default"
        data-assets-path="<?= url(CONF_THEME_3 . "/assets/") ?>"
        data-template="horizontal-menu-template-no-customizer-starter">
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

    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/fonts/boxicons.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/fonts/fontawesome.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/fonts/flag-icons.css") ?>"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/css/rtl/core.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/css/rtl/theme-default.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/css/demo.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/libs/typeahead-js/typeahead.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/libs/toastr/toastr.css") ?>"/>
    <link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/libs/animate-css/animate.css") ?>"/>

    <!-- Vendors CSS -->
    <?= $this->section("style"); ?>

    <!-- Page CSS -->
    <?= $this->section("stylePage"); ?>

    <!-- Helpers -->
    <script src="<?= url(CONF_THEME_3 . "/assets/vendor/js/helpers.js") ?>"></script>
    <script src="<?= url(CONF_THEME_3 . "/assets/js/config.js") ?>"></script>

    <?= $this->section("style"); ?>

    <!-- Custom -->
    <link href="<?= url("shared/assets/css/custom.css") ?>" rel="stylesheet" type="text/css"/>
</head>

<body>
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
    <div class="loader-text mt-5"><h5 class="mt-5 px-5 py-2"></h5></div>
</div>

<div id="url-global" data-url="<?= url() ?>"></div>
<div id="alert-flash" class="d-none"><?= flash() ?></div>
<div id="alert-container-toast" class="toast-container position-fixed top-0 end-0 p-3"></div>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
    <div class="layout-container">

        <?= $this->insert("views/header"); ?>

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Content wrapper -->
            <div class="content-wrapper">

                <?= $this->insert("views/menu"); ?>

                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">

                    <?= $this->section("content"); ?>

                </div>
                <!--/ Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            | Feito por IsslerWeb
                        </div>
                        <div class="d-none d-lg-inline-block">
                            < / >
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!--/ Content wrapper -->
        </div>

        <!--/ Layout container -->
    </div>
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>

<!--/ Layout wrapper -->

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
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/toastr/toastr.js") ?>"></script>
<!-- endbuild -->

<!-- Page JS -->
<?= $this->section("scripts"); ?>

<script src="<?= url("shared/assets/js/custom.js") ?>"></script>

<!-- Main JS -->
<script src="<?= url(CONF_THEME_3 . "/assets/js/main.js") ?>"></script>


<?= $this->section("scriptPage"); ?>
</body>
</html>