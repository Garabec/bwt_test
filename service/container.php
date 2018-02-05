<?php

$sc= new ContainerBuilder();

$sc->set('request',new Request);
$sc->set('session',new Session);
$sc->set('repasitory_man',new RepasitoryManager());
//$sc->set('captcha',require_once(LIB_DIR.DS."captcha".DS."captcha.php"));




return $sc;