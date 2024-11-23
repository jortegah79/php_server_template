<?php

use App\services\Bbdd;

if ($_SERVER['']) {

    //BASE DE DATOS LOCAL
    define("DB_USERNAME", "");
    define("DB_PASSWORD", "");
    define("DB_HOST", "");
    define("DB", "");
    $bd=new Bbdd(DB_USERNAME,DB_PASSWORD,DB_HOST,DB);
    define('DEBUG',false);

} else {

    //BASE DE DATOS SERVER
    define("DB_USERNAME", "");
    define("DB_PASSWORD", "");
    define("DB_HOST", "");
    define("DB", "");
    $bd=new Bbdd(DB_USERNAME,DB_PASSWORD,DB_HOST,DB);
    define('DEBUG',true);
}


//php mailer

define("MAILER_HOST", " ");
define("MAILER_USERNAME", " ");
define("MAILER_PASSWORD", " ");
define("MAILER_FROM", " ");
define("MAILER_FROM_NAME", " ");
define("MAILER_COPY_BBC", "");
