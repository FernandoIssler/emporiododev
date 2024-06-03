<?php $this->layout("auth/_auth"); ?>

<h5 class="text-primary">Perdeu sua senha?</h5>
<p class="text-muted">Vamos te ajudar com isso.</p>

<div class="mt-2 text-center">
    <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c" class="avatar-xl">
    </lord-icon>
</div>

<div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
    Digite o e-mail para receber instruções de recuperação do acesso
</div>
<div class="p-2">
    <form action="<?= url("/recover"); ?>" method="post">
        <div id="alert-container-fixed"></div>
        <?= csrf_input(); ?>
        <div class="mb-4">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Digite o e-mail cadastrado no <?= CONF_SITE_NAME ?>">
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-success w-100" type="submit">Recuperar</button>
        </div>
    </form>
</div>

<div class="mt-5 text-center">
    <p class="mb-0">Espere, acho que lembrei minha senha...
        <a href="<?= url("entrar") ?>" class="fw-semibold text-primary text-decoration-underline"> Entrar </a></p>
</div>