<?php $this->layout("_theme"); ?>


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"> /</span> Produtos
        <a href="<?= url("/app/produto") ?>" class="btn btn-info float-end">Novo Produto</a>
    </h4>

    <!-- Product List Widget -->

    <div class="card mb-4">
        <div class="card-widget-separator-wrapper">

        </div>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table card-table">
            <thead>
            <tr>
                <th></th>
                <th>Produto</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            <?php foreach ($products as $product): ?>
                <tr id="product<?= $product->id ?>">
                    <td>
                        <img src="<?= $product->cover ?>" width="60px" class="rounded-circle">
                    </td>
                    <td><?= $product->title ?></td>
                    <td><?= $product->description ?></td>
                    <td><span class="badge bg-label-primary me-1">R$ <?= str_price($product->price) ?></span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="<?= url("/app/produto/{$product->id}") ?>"><i class="bx bx-edit-alt me-1"></i>
                                    Editar</a>
                                <a class="dropdown-item delete" data-id="<?= $product->id ?>" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                    Excluir</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $this->end(); ?>

<?php $this->start("scriptPage"); ?>
<script>
    $(document).ready(function () {

        $(".delete").click(function () {
            let productId = $(this).data("id");

            Swal.fire({
                title: "Tem certeza que deseja excluir esse produto?",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: "Sim,quero excluir",
                denyButtonText: `Cancelar`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url: "<?= url("app/product/delete") ?>",
                        data: {
                            id: productId
                        }
                    })
                        .done(function (msg) {
                            Swal.fire("Produto excluído com sucesso", "", "success");
                            $("#product" + productId).fadeOut("slow", function () {
                                $(this).remove();
                            });
                        });
                } else if (result.isDenied) {
                    Swal.fire("Ufa, o produto não foi excluído", "", "info");
                }
            });
        });

    });
</script>
<?php $this->end(); ?>
