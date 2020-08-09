<?php
/**
 * Nạp các file cần thiết vào luồng chạy của MVC
 */
define("SITE_URL",dirname(__FILE__));

include_once SITE_URL."/mvc/route.php";
include_once SITE_URL."/mvc/models/Database.php";
include_once SITE_URL."/mvc/controllers/AuthorController.php";
include_once SITE_URL."/mvc/controllers/ErrorController.php";
include_once SITE_URL."/mvc/models/AuthorModel.php";

$route = new Route();

$route->run();

