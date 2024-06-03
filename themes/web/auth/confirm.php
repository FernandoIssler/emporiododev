<?php $this->layout("auth/_auth"); ?>


        <div class="mb-4">
            <div class="avatar-lg mx-auto">
                <div class="avatar-title bg-light text-primary display-5 rounded-circle">
                    <i class="ri-mail-line"></i>
                </div>
            </div>
        </div>
        <div class="text-muted text-center mx-lg-3">
            <h4 class="">Verifique seu e-mail</h4>
            <p>Enviamos um código de 4 dígitos para <span class="fw-semibold"><?= $email ?></span></p>
        </div>

        <div class="mt-4">
            <form action="<?= url("/confirm"); ?>" method="post" autocomplete="off">
                <div id="alert-container-fixed"></div>
                <?= csrf_input(); ?>
                <input type="hidden" name="email" value="<?= $email ?>">
                <input type="hidden" name="confirm" value="true">
                <div class="row">
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="digit1-input" class="visually-hidden">Digit 1</label>
                            <input type="text" name="digit1" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(1, event)" maxLength="1" id="digit1-input">
                        </div>
                    </div><!-- end col -->

                    <div class="col-3">
                        <div class="mb-3">
                            <label for="digit2-input" class="visually-hidden">Digit 2</label>
                            <input type="text" name="digit2" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(2, event)" maxLength="1" id="digit2-input">
                        </div>
                    </div><!-- end col -->

                    <div class="col-3">
                        <div class="mb-3">
                            <label for="digit3-input" class="visually-hidden">Digit 3</label>
                            <input type="text" name="digit3" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(3, event)" maxLength="1" id="digit3-input">
                        </div>
                    </div><!-- end col -->

                    <div class="col-3">
                        <div class="mb-3">
                            <label for="digit4-input" class="visually-hidden">Digit 4</label>
                            <input type="text" name="digit4" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(4, event)" maxLength="1" id="digit4-input">
                        </div>
                    </div><!-- end col -->
                </div>

                <div class="mt-3">
                    <button id="form-confirm" type="submit" class="btn btn-success w-100">Confirmar</button>
                </div>

            </form>

        </div>

        <div class="mt-5 text-center">
            <p class="mb-0">Não recebeu o código?
                <a href="javascript:void(0)" data-post="<?= url("/confirm/resendCode/{$email}"); ?>" class="fw-semibold text-primary text-decoration-underline">Reenviar</a>
            </p>
        </div>

<?php $this->start("scripts"); ?>
    <script>
        //Two Steps Verification
        function getInputElement(index) {
            return document.getElementById('digit' + index + '-input');
        }

        function moveToNext(index, event) {
            const eventCode = event.which || event.keyCode;
            if (getInputElement(index).value.length === 1) {
                if (index !== 4) {
                    getInputElement(index + 1).focus();
                } else {
                    getInputElement(index).blur();
                    document.getElementById("form-confirm").submit()
                }
            }
            if (eventCode === 8 && index !== 1) {
                getInputElement(index - 1).focus();
            }
        }
    </script>
<?php $this->end(); ?>