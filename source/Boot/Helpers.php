<?php

/**
 * ####################
 * ###   VALIDATE   ###
 * ####################
 */

/**
 * @param string $email
 * @return bool
 */
function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * @param string $password
 * @return bool
 */
function is_passwd(string $password): bool
{
    if (password_get_info($password)['algo'] || (mb_strlen($password) >= CONF_PASSWD_MIN_LEN && mb_strlen($password) <= CONF_PASSWD_MAX_LEN)) {
        return true;
    }

    return false;
}

/**
 * ##################
 * ###   STRING   ###
 * ##################
 */

/**
 * @param string $string
 * @return string
 */
function toDecode(string $string): string
{
    return iconv('UTF-8', 'ISO-8859-1', $string);
}

function str_slug(string $string): string
{
    $string = filter_var(mb_strtolower($string), FILTER_UNSAFE_RAW);
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyrr                                 ';

    $slug = str_replace(
        ["-----", "----", "---", "--"],
        "-",
        str_replace(
            " ",
            "-",
            trim(strtr(toDecode($string), toDecode($formats), $replace))
        )
    );
    return $slug;
}

/**
 * @param string $string
 * @return string
 */
function str_studly_case(string $string): string
{
    $string = str_slug($string);
    $studlyCase = str_replace(
        " ",
        "",
        mb_convert_case(str_replace("-", " ", $string), MB_CASE_TITLE)
    );

    return $studlyCase;
}

/**
 * @param string $string
 * @return string
 */
function str_camel_case(string $string): string
{
    return lcfirst(str_studly_case($string));
}

/**
 * @param string $string
 * @return string
 */
function str_title(string $string): string
{
    return mb_convert_case(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE);
}

/**
 * @param string $text
 * @return string
 */
function str_textarea(string $text): string
{
    $text = filter_var($text, FILTER_UNSAFE_RAW);
    $arrayReplace = ["&#10;", "&#10;&#10;", "&#10;&#10;&#10;", "&#10;&#10;&#10;&#10;", "&#10;&#10;&#10;&#10;&#10;"];
    return "<p>" . str_replace($arrayReplace, "</p><p>", $text) . "</p>";
}

/**
 * @param string $string
 * @param int $limit
 * @param string $pointer
 * @return string
 */
function str_limit_words(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    $arrWords = explode(" ", $string);
    $numWords = count($arrWords);

    if ($numWords < $limit) {
        return $string;
    }

    $words = implode(" ", array_slice($arrWords, 0, $limit));
    return "{$words}{$pointer}";
}

/**
 * @param string $string
 * @param int $limit
 * @param string $pointer
 * @return string
 */
function str_limit_chars(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    if (mb_strlen($string) <= $limit) {
        return $string;
    }

    $chars = mb_substr($string, 0, mb_strrpos(mb_substr($string, 0, $limit), " "));
    return "{$chars}{$pointer}";
}

/**
 * @param string $price
 * @return string
 */
function str_price(?string $price, bool $unround = false): string
{
    if ($unround) {
        $price = intval(($price * 100)) / 100;
    }

    return number_format(($price ?? 0), 2, ",", ".");
}

/**
 * @param string|null $search
 * @return string
 */
function str_search(?string $search): string
{
    if (!$search) {
        return "all";
    }

    $search = preg_replace("/[^a-z0-9A-Z\@\ ]/", "", $search);
    return (!empty($search) ? $search : "all");
}

/**
 * @param string|null $value
 * @return string
 */
function str_float(?string $value): string
{
    return trim(str_replace(["%", "R$", ".", ","], ["", "", "", "."], $value));
}

/**
 * @param string|null $value
 * @return float
 */
function round_float(?string $value): float
{
    return floatval(number_format(floatval($value), 2, ".", ""));
}

/**
 * @param string|null $value
 * @return string
 */
function str_percent(?string $value): string
{
    return str_replace(".", ",", $value);
}

/**
 * @param DateTime $start
 * @param DateTime $end
 * @return string
 */
function str_date_diff(DateTime $start, DateTime $end): string
{

    $dateDiff = $start->diff($end);

    if ($dateDiff->days == 0) {
        return "Day trade";
    }

    //Months
    $months = ($dateDiff->y > 0 ? $dateDiff->y * 12 : 0) + $dateDiff->m;
    $monthsStr = ($months == 1 ? "mês" : "meses");
    if ($months > 0) {
        $monthsReturn = $months . " " . $monthsStr;
    }

    //Days
    $days = $dateDiff->d;
    $daysStr = ($dateDiff->d == 1 ? "dia" : "dias");
    if ($days > 0) {
        $daysReturn = $days . " " . $daysStr;
    }

    //And condition
    if (isset($monthsReturn) && isset($daysReturn)) {
        $return = $monthsReturn . " e " . $daysReturn;
    } else {
        $return = ($monthsReturn ?? $daysReturn);
    }

    return $return;
}

function str_avarage_diff(array $dates): string
{
    $dates = array_map('strtotime', $dates);
    $average = array_sum($dates) / count($dates);
    return str_date_diff(new DateTime("now"), new DateTime(date("Y-m-d", $average)));
}

/**
 * ###############
 * ###   URL   ###
 * ###############
 */

/**
 * @param string $path
 * @return string
 */
function url(string $path = null): string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost") !== false) {
        if ($path) {
            return CONF_URL_TEST . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST;
    }

    if ($path) {
        return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }

    return CONF_URL_BASE;
}

/**
 * @return string
 */
function url_back(): string
{
    if (!empty($_SERVER["HTTP_REFERER"]) && str_contains($_SERVER["HTTP_REFERER"], CONF_SITE_DOMAIN)) {
        return $_SERVER["HTTP_REFERER"];
    }

    return url();
}

/**
 * @param string $url
 */
function redirect(string $url): void
{
    header("HTTP/1.1 302 Redirect");
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }

    if (filter_input(INPUT_GET, "route", FILTER_DEFAULT) != $url) {
        $location = url($url);
        header("Location: {$location}");
        exit;
    }
}

/**
 * ##################
 * ###   ASSETS   ###
 * ##################
 */

/**
 * @return \Source\Models\User|null
 */
function user(): ?\Source\Models\User
{
    return \Source\Models\Auth::user();
}

/**
 * @return \Source\Core\Session
 */
function session(): \Source\Core\Session
{
    return new \Source\Core\Session();
}

/**
 * @param string|null $path
 * @param string $theme
 * @return string
 */
function theme(string $path = null, string $theme = CONF_VIEW_THEME): string
{

    if (str_contains($_SERVER['HTTP_HOST'], "localhost")) {
        if ($path) {
            return CONF_URL_TEST . "/themes/{$theme}/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }

        return CONF_URL_TEST . "/themes/{$theme}";
    }

    if ($path) {
        return CONF_URL_BASE . "/themes/{$theme}/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }

    return CONF_URL_BASE . "/themes/{$theme}";
}

/**
 * @param string $image
 * @param int $width
 * @param int|null $height
 * @return string
 */
function image(?string $image, int $width, int $height = null): ?string
{
    if ($image) {
        return url() . "/" . (new \Source\Support\Thumb())->make($image, $width, $height);
    }

    return null;
}

/**
 * ################
 * ###   DATE   ###
 * ################
 */

/**
 * @param string $date
 * @param string $format
 * @return string
 * @throws Exception
 */
function date_fmt(?string $date, string $format = "d/m/Y H\hi"): string
{
    $date = (empty($date) ? "now" : $date);
    return (new DateTime($date))->format($format);
}

/**
 * @param string $date
 * @return string
 * @throws Exception
 */
function date_fmt_br(?string $date): string
{
    $date = (empty($date) ? "now" : $date);
    return (new DateTime($date))->format(CONF_DATE_BR);
}

/**
 * @param string|null $date
 * @return string
 * @throws Exception
 */
function date_fmt_day(string $date = "now"): string
{
    $day = (new DateTime($date))->format("D");
    $dayBr = array(
        'Sun' => 'Dom',
        'Mon' => 'Seg',
        'Tue' => 'Ter',
        'Wed' => 'Qua',
        'Thu' => 'Qui',
        'Fri' => 'Sex',
        'Sat' => 'Sáb'
    );

    return $dayBr[$day];
}

/**
 * @param string|null $date
 * @return string
 * @throws Exception
 */
function date_fmt_app(?string $date = null): string
{
    $date = (empty($date) ? "now" : $date);
    return (new DateTime($date))->format(CONF_DATE_APP);
}

/**
 * @param string|null $date
 * @return string|null
 */
function date_fmt_back(?string $date): ?string
{
    if (!$date) {
        return null;
    }

    if (strpos($date, " ")) {
        $date = explode(" ", $date);
        return implode("-", array_reverse(explode("/", $date[0]))) . " " . $date[1];
    }

    return implode("-", array_reverse(explode("/", $date)));
}

/**
 * @param string $date
 * @param string $format
 * @param bool $future
 * @return bool
 */
function validateDate(string $date, string $format = "Y-m-d H:i:s", bool $future = false): bool
{
    $d = DateTime::createFromFormat($format, $date);
    if (!$future) {
        if ($d > new DateTime()) {
            return false;
        }
    }

    return $d && $d->format($format) == $date;
}

/**
 * ####################
 * ###   PASSWORD   ###
 * ####################
 */

/**
 * @param string $password
 * @return string
 */
function passwd(string $password): string
{
    if (!empty(password_get_info($password)['algo'])) {
        return $password;
    }

    return password_hash($password, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}

/**
 * @param string $password
 * @param string $hash
 * @return bool
 */
function passwd_verify(string $password, string $hash): bool
{
    return password_verify($password, $hash);
}

/**
 * @param string $hash
 * @return bool
 */
function passwd_rehash(string $hash): bool
{
    return password_needs_rehash($hash, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);
}

/**
 * ###################
 * ###   REQUEST   ###
 * ###################
 */

/**
 * @return string
 */
function csrf_input(): string
{
    $session = new \Source\Core\Session();
    $session->csrf();
    return "<input type='hidden' name='csrf' value='" . ($session->csrf_token ?? "") . "'/>";
}

/**
 * @param $request
 * @return bool
 */
function csrf_verify($request): bool
{
    $session = new \Source\Core\Session();
    if (empty($session->csrf_token) || empty($request['csrf']) || $request['csrf'] != $session->csrf_token) {
        return false;
    }
    return true;
}

/**
 * @return null|string
 */
function flash(): ?string
{
    $session = new \Source\Core\Session();
    if ($flash = $session->flash()) {
        return json_encode($flash);
    }
    return null;
}

/**
 * @param string $key
 * @param int $limit
 * @param int $seconds
 * @return bool
 */
function request_limit(string $key, int $limit = 5, int $seconds = 60, bool $reset = false): bool
{
    $session = new \Source\Core\Session();

    if ($reset && $session->has($key)) {
        $session->unset($key);
        return false;
    }

    if ($session->has($key) && $session->$key->time >= time() && $session->$key->requests < $limit) {
        $session->set($key, [
            "time" => time() + $seconds,
            "requests" => $session->$key->requests + 1
        ]);
        return false;
    }

    if ($session->has($key) && $session->$key->time >= time() && $session->$key->requests >= $limit) {
        return true;
    }

    $session->set($key, [
        "time" => time() + $seconds,
        "requests" => 1
    ]);

    return false;
}

/**
 * @param string $field
 * @param string $value
 * @return bool
 */
function request_repeat(string $field, string $value): bool
{
    $session = new \Source\Core\Session();
    if ($session->has($field) && $session->$field == $value) {
        return true;
    }

    $session->set($field, $value);
    return false;
}

/**
 * ##################
 * ###   IMAGES   ###
 * ##################
 */

function random_images(string $page): string
{
    $imagesDir = "shared/assets/images/pages/" . $page . "/";
    $images = glob(__DIR__ . "/../../" . $imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    $randomImage = $images[array_rand($images)];
    return url() . "/" . $imagesDir . basename($randomImage);
}

/**
 * #####################
 * ###   PAGSEGURO   ###
 * #####################
 */

function orderStatus(string $status): string
{
    switch ($status) {
        case 1:
            return "Agendada - A ordem de pagamento está aguardando a data agendada para processamento.";
        case 2:
            return "Processando - A ordem de pagamento está sendo processada pelo sistema.";
        case 3:
            return "Não Processada - A ordem de pagamento não pôde ser processada por alguma falha interna, a equipe do PagSeguro é notificada imediatamente assim que isso ocorre.";
        case 4:
            return "Suspensa - A ordem de pagamento foi desconsiderada pois a recorrência estava suspensa na data agendada para processamento.";
        case 5:
            return "Paga - A ordem de pagamento foi paga, ou seja, a última transação vinculada à ordem de pagamento foi paga.";
        case 6:
            return "Não Paga - A ordem de pagamento não pôde ser paga, ou seja, nenhuma transação associada apresentou sucesso no pagamento.";
    }
    return "Status desconhecido - Ocorreu algum erro, confira a assinatura diretamente no PagSeguro";
}

function transactionStatus(string $status): string
{
    switch ($status) {
        case 1:
            return "Aguardando pagamento - O comprador iniciou a transação, mas até o momento o PagSeguro não recebeu nenhuma informação sobre o pagamento.";
        case 2:
            return "Em análise - O comprador optou por pagar com um cartão de crédito e o PagSeguro está analisando o risco da transação.";
        case 3:
            return "Paga - A transação foi paga pelo comprador e o PagSeguro já recebeu uma confirmação da instituição financeira responsável pelo processamento.";
        case 4:
            return "Disponível - A transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta.";
        case 5:
            return "Em disputa - O comprador, dentro do prazo de liberação da transação, abriu uma disputa.";
        case 6:
            return "Devolvida - O valor da transação foi devolvido para o comprador.";
        case 7:
            return "Cancelada - A transação foi cancelada sem ter sido finalizada.";
    }
    return "Status desconhecido - Ocorreu algum erro, confira a transação diretamente no PagSeguro";
}