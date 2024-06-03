<?php

namespace Source\App;

use Exception;
use Source\Core\Controller;
use Source\Core\Session;
use Source\Core\View;
use Source\Models\App\Products;
use Source\Models\Auth;
use Source\Models\Report\Access;
use Source\Models\Report\Online;
use Source\Models\User;
use Source\Support\Email;
use Source\Support\Thumb;
use Source\Support\Upload;

/**
 * Class App
 * @package Source\App
 */
class App extends Controller
{
    /** @var User */
    private $user;

    /**
     * App constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP . "/");

        if (!$this->user = Auth::user()) {
            $this->message->warning("Efetue login para acessar o APP.")->flash();
            redirect("/entrar");
        }

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
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("home", [
            "head" => $head,
            "active" => "home",
            "products" => (new Products())->find()->fetch(true)
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
            theme("/assets/images/share.jpg"),
            false
        );

        $product = (new Products())->findById($data["id"]);

        if (!$product) {
            $this->message->error(
                "Você tentou acessar um produto que não existe ou que você não tem permissão.",
                "Oops...")->toast()->flash();
            redirect("/app");
        }

        echo $this->view->render("product", [
            "head" => $head,
            "active" => "home",
            "product" => $product
        ]);
    }

    /**
     * @param array $data
     * @return void
     */
    public function newProduct(array $data): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        if (!empty($data["create"])) {

            $product = (new Products());
            $product->category = 1;
            $product->title = $data["title"];
            $product->description = $data["description"];
            $product->price = str_float($data["price"]);
            $product->cover = $data["cover"];

            if ($product->save()) {
                $this->message->toast()->success("Produto criado com sucesso.", "Sucesso!")->flash();
                $json["redirect"] = url("/app/produto/{$product->id}");
                echo json_encode($json);
                return;
            }
        }

        echo $this->view->render("newProduct", [
            "head" => $head,
            "active" => "product",
        ]);
    }

    /**
     * @param array $data
     * @return void
     */
    public function editProduct(array $data): void
    {
        $product = (new Products())->findById($data["id"]);

        $product->title = $data["title"];
        $product->description = $data["description"];
        $product->price = str_float($data["price"]);
        $product->cover = $data["cover"];

        if ($product->save()) {
            $this->message->toast()->success("Produto editado com sucesso.", "Sucesso!")->flash();
            $json["redirect"] = url("/app/produto/{$product->id}");
            echo json_encode($json);
        }

    }

    /**
     * @param array $data
     * @return void
     */
    public function deleteProduct(array $data): void
    {
        $product = (new Products())->findById($data["id"]);
        $product->destroy();
    }

    /**
     * APP LOGOUT
     */
    public function logout(): void
    {
        $this->message->info("Você saiu com sucesso " . Auth::user()->first_name . ". Volte logo :)")->flash();

        Auth::logout();
        redirect("/entrar");
    }
}