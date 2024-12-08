<?php

define("DIR_ROOT", ROOT);
$web_root = $_SERVER["HTTP_HOST"];
$arrPath = explode('\\', DIR_ROOT);

$indexPath = array_search("htdocs",$arrPath);
$arrPath = array_slice($arrPath,$indexPath+1);

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}
$web_root .= '/' . implode("/",$arrPath) . "" ;

// variable global

// $web_root = 'http://localhost/duan1_3/';
// $web_root = 'http://vps.fptduyvan.id.vn:8085/';



// $web_root = 'https://web2.fptduyvan.id.vn/';
// define("DB_HOST", "localhost");
// define("DB_NAME", "duan1");
// define("DB_USER", "doanduyvan");
// define("DB_PASS", "doanduyvan");

$web_root = 'http://localhost:8085/';
define("DB_HOST", "db");
define("DB_NAME", "duan1_3");
define("DB_USER", "root");
define("DB_PASS", "123");

define("WEB_ROOT", $web_root);

