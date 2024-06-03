<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0 d-print-none">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner py-1">
            <!-- Page -->
            <li class="menu-item <?= $active == "home" ? "active" : null ?>">
                <a href="<?= url("app") ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Produtos</div>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- / Menu -->