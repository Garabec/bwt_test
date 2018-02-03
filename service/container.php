<?php

$sc= new ContainerBuilder();

$sc->set('request',new Request);
$sc->set('session',new Session);
$sc->set('repasitory_man',new RepasitoryManager());





return $sc;