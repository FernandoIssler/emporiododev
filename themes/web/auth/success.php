<?php $this->layout("auth/_auth"); ?>

<div class="text-center">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <lord-icon
            src="https://cdn.lordicon.com/gqjpawbc.json"
            trigger="loop"
            delay="100"
            style="width:150px;height:150px">
    </lord-icon>
    <div class="mt-4 pt-2">
        <h4>Que bom tê-lo conosco</h4>
        <p class="text-muted mx-4">Seu e-mail foi confirmado com sucesso.</p>
        <div class="mt-4">
            <a href="<?= url("entrar") ?>" class="btn btn-success w-100">Fazer login</a>
        </div>
    </div>
</div>
