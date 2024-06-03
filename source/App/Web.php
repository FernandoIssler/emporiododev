<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Core\Session;
use Source\Core\View;
use Source\Models\App\Nesletter;
use Source\Models\App\Products;
use Source\Models\Auth;
use Source\Models\Notification;
use Source\Models\Report\Access;
use Source\Models\Report\Online;
use Source\Models\User;
use Source\Support\Email;

/**
 * Web Controller
 * @package Source\App
 */
class Web extends Controller
{
    /**
     * Web constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");

        (new Access())->report();
        (new Online())->report();
    }

    /**
     * @return void
     */
    public function home(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            url("/shared/assets/images/share.png")
        );

        $products = (new Products())->find()->limit(12)->order("RAND()")->fetch(true);
        $slider = (new Products())->find()->limit(4)->order("RAND()")->fetch(true);

        echo $this->view->render("home", [
            "head" => $head,
            "user" => $user ?? null,
            "products" => $products,
            "sliders" => $slider
        ]);
    }

    /**
     * @return void
     */
    public function whoare(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            url("/shared/assets/images/share.png")
        );

        echo $this->view->render("whoare", [
            "head" => $head,
            "user" => $user ?? null
        ]);
    }

    /**
     * @return void
     */
    public function contact(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            url("/shared/assets/images/share.png")
        );

        echo $this->view->render("contact", [
            "head" => $head,
            "user" => $user ?? null
        ]);
    }

    /**
     * @param array $data
     * @return void
     */
    public function product(array $data): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            url("/shared/assets/images/share.png")
        );

        $product = (new Products())->findById($data["id"]);
        if (!$product) {
            redirect(url());
        }

        echo $this->view->render("product", [
            "head" => $head,
            "user" => $user ?? null,
            "product" => (new Products())->findById($data["id"]),
            "others" => (new Products())->find()->limit(8)->order("RAND()")->fetch(true)
        ]);
    }

    /**
     * @param array $data
     * @return void
     */
    public function newsletter(array $data): void
    {
        if (empty($data)) {
            $json['message'] = $this->message->warning("Você precisa informar seu e-mail para assinar a newsletter.")->render();
            echo json_encode($json);
            return;
        }

        $data = filter_var_array($data, FILTER_UNSAFE_RAW);

        if (!is_email($data["email"])) {
            $json['message'] = $this->message->error("Seu e-mail não é válido.")->render();
            echo json_encode($json);
            return;
        }

        $newsletter = (new Nesletter());
        $newsletter->email = $data["email"];
        if ($newsletter->save()) {

            //E-mail to User
            $email = new Email();
            $view = new View(__DIR__ . "/../../shared/views/email");
            $subject = "Newsletter assinada com sucesso!";
            $body = $view->render("mail", [
                "subject" => $subject,
                "message" => "<h3>Tudo certo!</h3><p><strong>Você assinou a nossa newsletter com sucesso!</strong></p><p>Estamos ansiosos para enviar as novidades em primeira mão para você.</p><p>Qualquer dúvida entre em contato consoco, esperamos que você tenha a melhor exeperiência com o " . CONF_SITE_NAME . ", ainda assim, caso prefira, pode responder a este e-mail ou então nos procurar nas redes sociais!</p><p>Estaremos sempre disponíveis!</p><p>Somos focados em proporcionar a melhor experiência com a máxima transparência possível e estaremos sempre dispostos a ajudá-lo nessa tarefa!</p><h3>Conte conosco!</h3>"
            ]);
            $email->bootstrap($subject, $body, $data["email"], $data["email"])->send();

            $json['message'] = $this->message->success("Seu e-mail foi cadastrado com sucesso.")->render();
            echo json_encode($json);
        } else {
            $json['message'] = $this->message->error("Ocorreu algum erro, tente novamente mais tarde.")->render();
            echo json_encode($json);
        }
    }

    /**
     * SITE REGISTER
     * @param null|array $data
     * @return void
     */
    public function register(?array $data): void
    {
        $data = filter_var_array($data, FILTER_UNSAFE_RAW);

        if (user()) {
            redirect("/app");
        }

        if (!empty($data['csrf'])) {
            if (in_array("", $data)) {
                $json['message'] = $this->message->warning("Informe seus dados para criar sua conta.")->render();
                echo json_encode($json);
                return;
            }

            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if (!isset($data["agree"])) {
                $json['message'] = $this->message->error("Você deve aceitar os Termos de Uso e a Política de Privacidade para continuar o cadastro.")->render();
                echo json_encode($json);
                return;
            }

            $auth = new Auth();
            $user = new User();
            $user->bootstrap(
                $data["first_name"],
                $data["last_name"],
                $data["email"],
                $data["password"]
            );

            if ($auth->register($user)) {
                $json['redirect'] = url("/confirma/" . $data["email"]);
            } else {
                $json['message'] = $auth->message()->before("Ooops! ")->render();
            }

            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Criar Conta - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/cadastrar"),
            url("/shared/assets/images/share.png")
        );

        echo $this->view->render("auth/register", [
            "head" => $head
        ]);
    }

    /**
     * SITE LOGIN
     * @param null|array $data
     */
    public function login(?array $data): void
    {
        $data = filter_var_array($data, FILTER_UNSAFE_RAW);

        if (Auth::user()) {
            redirect("/app");
        }

        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if (request_limit("weblogin", 5, 60 * 5)) {
                $json['message'] = $this->message
                    ->error("Você já efetuou 5 tentativas. Por favor, aguarde 5 minutos para tentar novamente!",)
                    ->render();
                echo json_encode($json);
                return;
            }

            if (empty($data['email'])) {
                $json['message'] = $this->message->warning("Informe seu email para entrar")->render();
                echo json_encode($json);
                return;
            }

            if (empty($data['password'])) {
                $json['message'] = $this->message->warning("Informe sua senha para entrar")->render();
                echo json_encode($json);
                return;
            }

            $save = !empty($data['save']);
            $auth = new Auth();
            $login = $auth->login($data['email'], $data['password'], $save);

            if ($login) {
                (new Session())->unset("weblogin");

                $user = $auth->user();

                //Unconfirmed e-mail
                if ($user->status != "confirmed") {
                    (new Auth())->register($user, true);
                    Auth::logout();

                    $this->message->info("E-mail pendente de confirmação, acabamos de reenviar o seu código de ativação.")->flash();
                    $json["redirect"] = url("/confirma/{$user->email}");
                    echo json_encode($json);
                    return;
                }

                $user->ingress += 1;
                $user->save();

                $json['redirect'] = url("entrar");
            } else {
                $json['message'] = $auth->message()->render();
            }

            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Entrar - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/entrar"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("auth/login", [
            "head" => $head,
            "cookie" => filter_input(INPUT_COOKIE, "authEmail")
        ]);
    }

    /**
     * SITE PASSWORD FORGET
     * @param null|array $data
     * @return void
     */
    public function forget(?array $data): void
    {
        $data = filter_var_array($data, FILTER_UNSAFE_RAW);

        if (Auth::user()) {
            $this->message->warning("Você já está logado")->toast()->flash();
            redirect(url());
        }

        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if (empty($data["email"])) {
                $json['message'] = $this->message->info("Informe seu e-mail para continuar")->render();
                echo json_encode($json);
                return;
            }

            if (request_repeat("webforget", $data["email"])) {
                $json['message'] = $this->message->error("Oops! Você já tentou este e-mail antes")->render();
                echo json_encode($json);
                return;
            }

            $auth = new Auth();
            if ($auth->forget($data["email"])) {
                $json["message"] = $this->message->success("Acesse seu e-mail para recuperar a senha")->render();
            } else {
                $json["message"] = $auth->message()->before("Ooops! ")->render();
            }

            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Recuperar Senha - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/recuperar"),
            url("/shared/assets/images/share.png")
        );

        echo $this->view->render("auth/forget", [
            "head" => $head
        ]);
    }

    /**
     * SITE FORGET RESET
     * @param array $data
     * @return void
     */
    public function reset(array $data): void
    {
        $data = filter_var_array($data, FILTER_UNSAFE_RAW);

        if (Auth::user()) {
            redirect("/app");
        }

        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if (empty($data["password"]) || empty($data["password_re"])) {
                $json["message"] = $this->message->info("Informe e repita a senha para continuar")->render();
                echo json_encode($json);
                return;
            }

            $auth = new Auth();

            if ($auth->reset($data["email"], $data["code"], $data["password"], $data["password_re"])) {
                $this->message->success("Senha alterada com sucesso, você já pode usar a nova senha para entrar.")->flash();
                $json["redirect"] = url("entrar");
            } else {
                $json["message"] = $auth->message()->before("Ooops! ")->render();
            }

            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Crie sua nova senha no " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/recuperar"),
            url("/shared/assets/images/share.png")
        );

        echo $this->view->render("auth/reset", [
            "head" => $head,
            "email" => $data["email"],
            "code" => $data["code"]
        ]);
    }

    /**
     * SITE OPT-IN CONFIRM
     * @param array $data
     * @return void
     */
    public function confirm(array $data): void
    {
        $data = filter_var_array($data, FILTER_UNSAFE_RAW);

        $user = (new User())->findByEmail($data["email"]);
        if (!$user || $user->status == "confirmed") {
            $this->message->error("O e-mail que você está tentando confirmar não existe ou já foi confirmado.")->toast()->flash();

            if (isset($data["resendCode"])) {
                $json["redirect"] = url("/entrar");
                echo json_encode($json);
                return;
            }

            redirect(url("/entrar"));
            return;
        }

        if (isset($data["resendCode"])) {
            $resendCode = (new Auth())->register($user, true);
            if ($resendCode) {
                $json['message'] = $this->message->success(
                    "Reenviamos o código de ativação. Confira na Lixeira e na caixa de Spam."
                )->render();
                echo json_encode($json);
                return;
            }
        }

        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if (request_limit("activation", 5, 60 * 5)) {
                $json['message'] = $this->message
                    ->error("Você já efetuou 5 tentativas. Por favor, aguarde 5 minutos para tentar novamente!",)
                    ->render();
                echo json_encode($json);
                return;
            }

            $code = $data["digit1"] . $data["digit2"] . $data["digit3"] . $data["digit4"];
            if (strlen($code) != 4) {
                $json['message'] = $this->message->warning("Está faltando algum dígito.")->render();
                echo json_encode($json);
                return;
            }

            if ($code == $user->code) {
                //Confirm User
                $user->status = "confirmed";
                $user->code = null;
                $user->save();

                //Notification (Admin)
                $notification = (new Notification());
                $notification->image = "/shared/images/notifications/new-user.png";
                $notification->content = $user->fullName() . " acabou de se cadastrar";
                $notification->uri = "/users/user/" . $user->id;
                $notification->save();

                //E-mail to User
                $email = new \Source\Support\Email();
                $view = new \Source\Core\View(__DIR__ . "/../../shared/views/email");
                $subject = "Cadastro confirmado!";
                $body = $view->render("mail", [
                    "subject" => $subject,
                    "message" => "<h3>Tudo certo, {$user->first_name}</h3><p><strong>Você concluiu o seu cadastro!</strong></p><p>Estamos ansiosos para ajudá-lo no controle de reservas!</p><p>No decorrer do uso pode contar conosco para qualquer eventualidade, esperamos que você tenha a melhor exeperiência com o " . CONF_SITE_NAME . ", ainda assim, caso prefira, pode responder a este e-mail ou então nos procurar nas redes sociais!</p><p>Estaremos sempre disponíveis!</p><p>Somos focados em proporcionar a melhor experiência com a máxima transparência possível e estaremos sempre dispostos a ajudá-lo nessa tarefa!</p><h3>Conte conosco!</h3>"
                ]);
                $email->bootstrap($subject, $body, $user->email, "{$user->first_name} {$user->last_name}")->send();

                //E-mail to Admin
                $email = new \Source\Support\Email();
                $view = new \Source\Core\View(__DIR__ . "/../../shared/views/email");
                $subject = "+ 1 inscrito";
                $body = $view->render("mail", [
                    "subject" => "+ 1 inscrito",
                    "message" => "<h3>Oba, mais um inscrito.</h3><br><p>O nome é <strong>{$user->fullName()}</strong></p><p><a href='" . CONF_URL_BASE . "/admin/users/user/{$user->id}" . "'>Visitar perfil</a></p><p>Proporcione a melhor experiência para o usuário!</p>"
                ]);
                $email->bootstrap(
                    $subject,
                    $body,
                    CONF_MAIL_USER,
                    "{$user->first_name} {$user->last_name}"
                )->send();


                $json['redirect'] = url("/obrigado/{$user->email}");
                echo json_encode($json);
                return;
            } else {
                $json['message'] = $this->message->error("Código inválido.")->render();
                echo json_encode($json);
                return;
            }

        }

        $head = $this->seo->render(
            "Confirme Seu Cadastro - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/confirma"),
            url("/shared/assets/images/share.png")
        );

        echo $this->view->render("auth/confirm", [
            "head" => $head,
            "email" => $user->email
        ]);
    }

    /**
     * SITE OPT-IN SUCCESS
     * @param array $data
     * @return void
     */
    public function success(array $data): void
    {
        $head = $this->seo->render(
            "Bem-vindo ao " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/obrigado"),
            url("/shared/assets/images/share.png")
        );

        echo $this->view->render("auth/success", [
            "head" => $head
        ]);
    }

    /**
     * APP LOGOUT
     * @return void
     */
    public function logout(): void
    {
        $this->message->info("Você saiu com sucesso", "Logout")->toast()->flash();

        Auth::logout();
        redirect(url());
    }

    /**
     * SITE NAV ERROR
     * @param array $data
     */
    public function error(array $data): void
    {
        $error = new \stdClass();
        $data = filter_var_array($data, FILTER_UNSAFE_RAW);

        switch ($data['errcode']) {
            case "problemas":
                $error->code = "Oops...";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que nosso serviço não está diponível no momento. Já estamos vendo isso mas caso precise, nos envie um e-mail.";
                $error->linkTitle = "ENVIAR E-MAIL";
                $error->link = "mailto:" . CONF_MAIL_SUPPORT;
                break;

            case "manutencao":
                $error->code = "Oops...";
                $error->title = "Desculpe. Estamos em manutenção!";
                $error->message = "Voltamos logo! Neste exato momento estamos trabalhando para melhorar nosso conteúdo para você controlar ainda melhor os seus investimentos.";
                $error->linkTitle = null;
                $error->link = null;
                break;

            default:
                $error->code = $data['errcode'];
                $error->title = "Conteúdo indispinível.";
                $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento ou foi removido.";
                $error->linkTitle = "Continue navegando!";
                $error->link = url();
                break;
        }

        $head = $this->seo->render(
            "{$error->code} | {$error->title}",
            $error->message,
            url("/ops/{$error->code}"),
            url("/shared/assets/images/share.png"),
            false
        );

        echo $this->view->render("error", [
            "head" => $head,
            "error" => $error
        ]);
    }
}
