<?php $this->layout("auth/_auth"); ?>

<div class="p-lg-5 p-4">
    <h5 class="text-primary">Criar nova senha</h5>
    <p class="text-muted">Crie uma nova senha e recupere o seu acesso.</p>


    <div class="p-2">
        <form action="<?= url("/recover/reset"); ?>" method="post">
            <?= csrf_input(); ?>
            <div id="alert-container-fixed"></div>
            <input type="hidden" name="email" value="<?= $email; ?>"/>
            <input type="hidden" name="code" value="<?= $code; ?>"/>
            <div class="mb-3">
                <label class="form-label" for="password-input">Senha</label>
                <div class="position-relative auth-pass-inputgroup">
                    <input type="password" name="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Digite a senha" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon" tabindex="-1">
                        <i class="ri-eye-fill align-middle"></i></button>
                </div>
                <div id="passwordInput" class="form-text">A senha deve ter no mínimo 8 caracteres.</div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="confirm-password-input">Confirme</label>
                <div class="position-relative auth-pass-inputgroup mb-3">
                    <input type="password" name="password_re" class="form-control pe-5 password-input" onpaste="return false" placeholder="Confirme a senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="confirm-password-input" required>
                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="confirm-password-addon" tabindex="-1">
                        <i class="ri-eye-fill align-middle"></i></button>
                    <div id="password-match" class="form-text"></div>
                </div>
            </div>

            <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                <h5 class="fs-13">Dicas para uma senha segura:</h5>
                <p id="pass-length" class="invalid fs-12 mb-2">No mínimo <b>8 caracteres</b></p>
                <p id="pass-lower" class="invalid fs-12 mb-2">Conter letras <b>minúsculas</b> (a-z)</p>
                <p id="pass-upper" class="invalid fs-12 mb-2">Conter letras <b>maiúsculas</b> (A-Z)</p>
                <p id="pass-number" class="invalid fs-12 mb-0">Conter <b>números</b> (0-9)</p>
            </div>

            <div class="mt-4">
                <button class="btn btn-success w-100" type="submit">Concluir</button>
            </div>

        </form>
    </div>

    <div class="mt-4 text-center">
        <p class="mb-0">Espere, acho que lembrei minha senha...
            <a href="<?= url("entrar") ?>" class="fw-semibold text-primary text-decoration-underline"> Entrar </a></p>
    </div>
</div>

<?php $this->start("scripts"); ?>
<script>
    // password addon
    document
        .querySelectorAll("form .auth-pass-inputgroup")
        .forEach(function (item) {
            item.querySelectorAll(".password-addon").forEach(function (subitem) {
                subitem.addEventListener("click", function (event) {
                    var passwordInput = item.querySelector(".password-input");
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                    } else {
                        passwordInput.type = "password";
                    }
                });
            });
        });

    // passowrd match
    var password = document.getElementById("password-input"),
        confirm_password = document.getElementById("confirm-password-input"),
        password_match = document.getElementById("password-match");

    function validatePassword() {
        console.log(password.value, confirm_password.value)
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Senhas não conferem");
            password_match.classList.remove("text-success");
            password_match.classList.add("text-danger");
            password_match.innerHTML = "Senhas NÃO conferem";
        } else {
            confirm_password.setCustomValidity("");
            password_match.classList.remove("text-danger");
            password_match.classList.add("text-success");
            password_match.innerHTML = "Senhas conferem";
        }
    }

    //Password validation
    if (confirm_password) {
        confirm_password.onkeyup = validatePassword;
    }

    var myInput = document.getElementById("password-input");
    var letter = document.getElementById("pass-lower");
    var capital = document.getElementById("pass-upper");
    var number = document.getElementById("pass-number");
    var length = document.getElementById("pass-length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
        document.getElementById("password-contain").style.display = "block";
    };

    // When the user clicks outside of the password field, hide the password-contain box
    myInput.onblur = function () {
        document.getElementById("password-contain").style.display = "none";
    };

    // When the user starts to type something inside the password field
    myInput.onkeyup = function () {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    };
</script>
<?php $this->end(); ?>
