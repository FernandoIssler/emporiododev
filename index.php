<?php
date_default_timezone_set('America/Sao_Paulo');
ini_set('xdebug.var_display_max_depth', 10);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

ob_start();

require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$route = new Router(url(), ":");
$route->namespace("Source\App");

/**
 * WEB ROUTES
 */
$route->group(null);
$route->get("/", "Web:home");
$route->get("/quemsomos", "Web:whoare");
$route->get("/contato", "Web:contact");
$route->get("/produto/{id}", "Web:product");
$route->post("/newsletter", "Web:newsletter");

//auth
$route->group(null);
$route->get("/entrar", "Web:login");
$route->post("/entrar", "Web:login");
$route->get("/cadastrar", "Web:register");
$route->post("/register", "Web:register");
$route->get("/recuperar", "Web:forget");
$route->post("/recover", "Web:forget");
$route->get("/recuperar/{email}/{code}", "Web:reset");
$route->post("/recover/reset", "Web:reset");

//optin
$route->group(null);
$route->get("/confirma/{email}", "Web:confirm");
$route->post("/confirm", "Web:confirm");
$route->post("/confirm/{resendCode}/{email}", "Web:confirm");
$route->get("/obrigado/{email}", "Web:success");

/**
 * APP
 */
$route->group("/app");
$route->get("/", "App:home");
$route->get("/produto", "App:newProduct");
$route->post("/product/new", "App:newProduct");
$route->get("/produto/{id}", "App:product");
$route->post("/product", "App:editProduct");
$route->post("/product/delete", "App:deleteProduct");

//Logout
$route->get("/sair", "Web:logout");

//END ROUTES
$route->namespace("Source\App");

/**
 * ERROR ROUTES
 */
$route->group("/ops");
$route->get("/{errcode}", "Web:error");

/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();
