<?php



class WeatherController extends Controller {
    
    
    public function indexAction(){
        
     
        
      $this->render();
      
    }
    
    
    public function viewAction(){
      
      $this->data =$this->container->get('repasitory_man')->get("_weather")->parse();
      $this->render();
      
    }
    
}