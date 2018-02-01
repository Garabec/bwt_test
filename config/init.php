<?php




function __autoload($classname){
    
  $Controller_class=CONTROLLER_DIR.DS.strtolower(str_replace("Controller","",$classname)).".controller.php";  
  $lib_class=LIB_DIR.DS.strtolower($classname).".class.php"; 
  $model_class=MODEL_DIR.DS.strtolower($classname).".php"; 
  
  
  var_dump($Controller_class);
  
  
  if(file_exists($Controller_class)){
      require_once($Controller_class);
      }
  elseif(file_exists($lib_class) ){
      require_once($lib_class);
      } 
  elseif(file_exists($model_class)){
      require_once($model_class);
  }else{
       
      throw new Exception("Failed to include class ".$classname); 
  }      
      
    
}


require_once(ROOT."/config/config.php");