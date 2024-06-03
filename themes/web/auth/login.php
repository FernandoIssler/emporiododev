<?php $this->layout("auth/_auth"); ?>


<h4 class="mb-2">Bem vindo! 👋</h4>
<p class="mb-4">Por favor, digite as suas credenciais</p>

<form class="mb-3" action="<?= url("/entrar"); ?>" method="post">

    <div id="alert-container-fixed"></div>
    <?= csrf_input() ?>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input
                type="text"
                class="form-control"
                id="email"
                name="email"
                placeholder="Digite seu e-mail"
                value="<?= ($cookie ?? null); ?>"
                autofocus/>
    </div>
    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Senha</label>
            <a href="<?= url("recuperar") ?>">
                <small>Perdeu sua senha?</small>
            </a>
        </div>
        <div class="input-group input-group-merge">
            <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"/>
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" name="save" type="checkbox" id="remember-me" <?= (!empty($cookie) ? "checked" : ""); ?> />
            <label class="form-check-label" for="remember-me"> Lembre de mim </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary d-grid w-100">Entrar</button>
</form>

<p class="text-center">
    <span>É novo por aqui?</span>
    <a href="<?= url("cadastrar") ?>">
        <span>Crie sua conta</span>
    </a>
</p>
