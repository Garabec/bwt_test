<?php


Config::set("site_name","Weather");

Config::set("layout", array(
     
     'default'=>"",
     
    
       ));
       
Config::set("Db_Connection",array(
    
     'host'=>'localhost',
     'db_name'=>'weather',
     'password'=>"",
     'user'=>""
    
     )); 
     
Config::set("router",array(

    "/weather"=>"weather/index",
    "/weather/view"=>"/weather/view",
    "/weather/message"=>"/weather/message",
    "/weather/feedback"=>"/weather/feedback",

 ));
 
 
 Config::set("default_layout","default");
 Config::set("default_router","default");
 Config::set("default_controller","weather");
 Config::set("default_method","index");