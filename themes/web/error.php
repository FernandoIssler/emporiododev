<!doctype html>
<html lang="pt-br">

<head>

    <?= $head ?>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= url() ?>/shared/assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= url() ?>/shared/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= url() ?>/shared/assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= url() ?>/shared/assets/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= url() ?>/shared/assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link href="<?= url(CONF_THEME . "/assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= url(CONF_THEME . "/assets/css/icons.min.css"); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= url(CONF_THEME . "/assets/css/app.min.css"); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= url("shared/styles/custom.css"); ?>" id="app-style" rel="stylesheet" type="text/css"/>

</head>

<body>



<!-- auth-page wrapper -->
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <lord-icon class="avatar-xl" src="https://cdn.lordicon.com/etwtznjn.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c">
                                </lord-icon>
                                <h4 class="text-uppercase"><?= $error->title; ?></h4>
                                <p class="text-muted mb-4"><?= $error->message; ?></p>
                                <?php if ($error->link): ?>
                                    <a class="btn btn-success" title="<?= $error->linkTitle; ?>" href="<?= $error->link; ?>"><?= $error->linkTitle; ?></a>
                                <?php else: ?>
                                    <a href="<?= url(); ?>" class="btn btn-success"><i class="mdi mdi-home me-1"></i>Home</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
</div>
<!-- end auth-page-wrapper -->

<script src="<?= url(CONF_THEME . "/assets/js/layout.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/libs/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/libs/simplebar/simplebar.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/libs/node-waves/waves.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/libs/feather-icons/feather.min.js"); ?>"></script>
<script src="<?= url(CONF_THEME . "/assets/js/pages/plugins/lord-icon-2.1.0.js"); ?>"></script>

