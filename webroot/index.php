<?php

define("ROOT",(dirname(__DIR__)));
define('DS', DIRECTORY_SEPARATOR);
define("LIB_DIR",ROOT.DS."lib");
define("MODEL_DIR",ROOT.DS."models");
define("CONTROLLER_DIR",ROOT.DS."controllers");
define("VENDOR_DIR",ROOT.DS."vendor");
define("VIEWS_DIR",ROOT.DS."views");
define("CONFIG",ROOT.DS."config");

require_once(CONFIG.DS."init.php");
Session::start();


 App::run($_SERVER["REQUEST_URI"]);