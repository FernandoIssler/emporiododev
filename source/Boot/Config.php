<?php

/**
 * DATABASE
 */
const CONF_DB_LIVE = ["host" => "mysql", "user" => "u948569319_lattes", "pass" => "2v*TFxP?", "database" => "u948569319_lattes"]; // produção
const CONF_DB_TEST = ["host" => "localhost", "user" => "root", "pass" => "", "database" => "emporiododev"]; // localhost

/**
 * PROJECT URLs
 */
const CONF_URL_BASE = "https://www.isslerweb.com.br/emporiododev/";
const CONF_URL_TEST = "http://www.localhost/emporiododev";

/**
 * SITE
 */
const CONF_SITE_NAME = "Empório do DEV";
const CONF_SITE_NAME_STYLED = "Empório do <span class=\"text-primary\">DEV</span>";
const CONF_SITE_EMAIL = "contato@emporiododev.com.br";
const CONF_SITE_EMAIL_ERROR = "error@emporiododev.com.br";
const CONF_SITE_TITLE = "Empório do DEV";
const CONF_SITE_DESC = "Sua loja virtual especializada em produtos e acessórios para desenvolvedores. Encontre tudo o que você precisa para impulsionar seu trabalho e aprimorar suas habilidades de programação. Explore nossa variedade de ferramentas, camisas, livros, gadgets e muito mais, projetados para atender às necessidades dos profissionais de tecnologia.";
const CONF_SITE_LANG = "pt_BR";
const CONF_SITE_DOMAIN = "emporiododev.com.br";
const CONF_SITE_ADDR_STREET = "";
const CONF_SITE_ADDR_NUMBER = "";
const CONF_SITE_ADDR_COMPLEMENT = "";
const CONF_SITE_ADDR_CITY = "";
const CONF_SITE_ADDR_STATE = "";
const CONF_SITE_ADDR_ZIPCODE = "";

/**
 * DATES
 */
const CONF_DATE_BR = "d/m/Y H:i:s";
const CONF_DATE_APP = "Y-m-d H:i:s";

/**
 * PASSWORD
 */
const CONF_PASSWD_MIN_LEN = 6;
const CONF_PASSWD_MAX_LEN = 40;
const CONF_PASSWD_ALGO = PASSWORD_DEFAULT;
const CONF_PASSWD_OPTION = ["cost" => 10];

/**
 * VIEW
 */
const CONF_VIEW_PATH = __DIR__ . "/../../shared/views";
const CONF_VIEW_EXT = "php";
const CONF_VIEW_THEME = "web";
const CONF_VIEW_APP = "app";
const CONF_VIEW_ADMIN = "adm";

/**
 * THEMES ASSETS
 */
const CONF_THEME = "shared/themes/etrade";
const CONF_THEME_2 = "shared/themes/velzon_v3.1";
const CONF_THEME_3 = "shared/themes/frest_v5";

/**
 * UPLOAD
 */
const CONF_UPLOAD_DIR = "storage";
const CONF_UPLOAD_IMAGE_DIR = "images";
const CONF_UPLOAD_FILE_DIR = "files";
const CONF_UPLOAD_MEDIA_DIR = "medias";

/**
 * IMAGES
 */
const CONF_IMAGE_CACHE = CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache";
const CONF_IMAGE_SIZE = 2000;
const CONF_IMAGE_QUALITY = ["jpg" => 75, "png" => 5];

/**
 * MAIL
 */
const CONF_MAIL_HOST = "smtp.hostinger.com";
const CONF_MAIL_PORT = "465";
const CONF_MAIL_USER = "emporiododev@isslerweb.com.br";
const CONF_MAIL_PASS = "3Ttmbd*yJe6wRwj";
const CONF_MAIL_SENDER = ["name" => "Empório do DEV", "address" => "emporiododev@isslerweb.com.br"];
const CONF_MAIL_SUPPORT = "emporiododev@isslerweb.com.br";
const CONF_MAIL_OPTION_LANG = "br";
const CONF_MAIL_OPTION_HTML = true;
const CONF_MAIL_OPTION_AUTH = true;
const CONF_MAIL_OPTION_SECURE = "ssl";
const CONF_MAIL_OPTION_CHARSET = "utf-8";

/**
 * SOCIAL
 */
const CONF_SOCIAL_TWITTER_CREATOR = "@creator";
const CONF_SOCIAL_TWITTER_PUBLISHER = "@creator";

const CONF_SOCIAL_FACEBOOK_APP = "5555555555";
const CONF_SOCIAL_FACEBOOK_PAGE = "pagename";
const CONF_SOCIAL_FACEBOOK_AUTHOR = "author";

const CONF_SOCIAL_GOOGLE_PAGE = "5555555555";
const CONF_SOCIAL_GOOGLE_AUTHOR = "5555555555";

const CONF_SOCIAL_INSTAGRAM_PAGE = "insta";

const CONF_SOCIAL_YOUTUBE_PAGE = "youtube";