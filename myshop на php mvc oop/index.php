<?php
 
//FRONT CONTROLLER

// 1. Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// 2. Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT. '/components/autoload.php');
 


// 3. Установка соединения с БД

// 4. Вызов Router


$router = new Router();
$router->run();



/*очень важно!!! чтобы добавить images и css в след проектах не забудь в htaccess прописать это а то работать не будет:
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
*/
?>