<?php $this->layout("_theme"); ?>


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"> /</span> Editar Produto
    </h4>

    <!-- Product List Widget -->

    <div class="card mb-4">
        <div class="card-widget-separator-wrapper">

        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Editar produto</h5>
        </div>
        <div class="card-body">
            <form action="<?= url("app/product/new") ?>">
                <input type="hidden" name="create" value="true">
                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" class="form-control" name="title" value="" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Preço</label>
                    <input type="text" name="price" class="form-control money" value="" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <small class="text-muted ms-3">
                        Não é possível fazer upload de imagens. Para exibir a foto forneça a URL.
                    </small>
                    <input type="text" name="cover" class="form-control" value="" required>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>

</div>

<?php $this->start("stylePage"); ?>
<link rel="stylesheet" href="<?= url(CONF_THEME_3 . "/assets/vendor/css/pages/app-academy.css") ?>"/>
<?php $this->end(); ?>


<?php $this->start("scripts"); ?>
<!-- Vendors JS -->
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/moment/moment.js") ?>"></script>
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js") ?>"></script>
<script src="<?= url(CONF_THEME_3 . "/assets/vendor/libs/apex-charts/apexcharts.js") ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php $this->end(); ?>

<?php $this->start("scriptPage"); ?>
<script>
    $('.money').mask("#.##0,00", {reverse: true});
</script>
<?php $this->end(); ?>
