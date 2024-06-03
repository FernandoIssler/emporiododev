<?php $this->layout("auth/_auth"); ?>


    <div>
        <h5 class="text-primary">Registre-se</h5>
        <p class="text-muted">Crie a sua conta no <?= CONF_SITE_NAME ?> agora.</p>
    </div>

    <div class="mt-4">
        <form action="<?= url("register") ?>" class="needs-validation" method="post" novalidate>
            <div id="alert-container-fixed"></div>
            <?= csrf_input() ?>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="name" class="form-label">Nome <span class="text-danger">*</span></label>
                    <input type="text" name="first_name" class="form-control" id="name" placeholder="Digite seu nome" required>
                    <div class="invalid-feedback">
                        Faltou o seu nome
                    </div>
                </div>
                <div class="col-6">
                    <label for="last-name" class="form-label">Sobrenome <span class="text-danger">*</span></label>
                    <input type="text" name="last_name" class="form-control" id="last-name" placeholder="Digite seu sobrenome" required>
                    <div class="invalid-feedback">
                        Faltou o seu sobrenome
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu e-mail" required>
                <div class="invalid-feedback">
                    Faltou o seu e-mail
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="password-input">Senha</label>
                <div class="position-relative auth-pass-inputgroup">
                    <input type="password" name="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Sua senha" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon">
                        <i class="ri-eye-fill align-middle"></i></button>
                    <div class="invalid-feedback">
                        Faltou a sua senha
                    </div>
                </div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="agree" id="auth-agree">
                <label class="form-check-label text-muted fst-italic" for="auth-agree">Eu concordo com os
                    <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">termos de uso</a> e
                    a <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">política de
                        privacidade</a>.</label>
            </div>

            <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                <h5 class="fs-13">Dicas para uma senha segura:</h5>
                <p id="pass-length" class="invalid fs-12 mb-2">Mínimo de <b>8 caracteres</b></p>
                <p id="pass-lower" class="invalid fs-12 mb-2">Conter letras <b>minúsculas</b> (a-z)</p>
                <p id="pass-upper" class="invalid fs-12 mb-2">Conter letras <b>maiúsculas</b> (A-Z)</p>
                <p id="pass-number" class="invalid fs-12 mb-0">Conter <b>números</b> (0-9)</p>
            </div>

            <div class="mt-4">
                <button class="btn btn-success w-100" type="submit">Concluir</button>
            </div>
        </form>
    </div>

    <div class="mt-5 text-center">
        <p class="mb-0">Já tem uma conta?
            <a href="<?= url("entrar"); ?>" class="fw-semibold text-primary text-decoration-underline"> Entrar</a></p>
    </div>

<?php $this->start("scripts"); ?>
    <!-- validation init -->
    <script src="<?= CONF_THEME_2 ?>/assets/js/pages/form-validation.init.js"></script>
    <!-- password create init -->
    <script src="<?= CONF_THEME_2 ?>/assets/js/pages/passowrd-create.init.js"></script>
<?php $this->end(); ?>