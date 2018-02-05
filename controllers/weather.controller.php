<?php



class WeatherController extends Controller {
    
    
    public function indexAction(){
        
     
        
      $this->render();
      
    }
    
    
    public function viewAction(){
      
      $this->data =$this->container->get('repasitory_man')->get("_weather")->parse();
      $this->render();
      
    }
    
    public function loginAction(Request $request){
        
        if($request->isPost()){
            $email = $request->getPostKey('email');
            
             $cl = $this->container->get('repasitory_man')->get('User')->getUserByEmail($email);
             
         //    var_dump($cl);
         //    die;
            
          if($cl['user_password'] == md5(Config::get('salt').$request->getPostKey('password'))){      // Правильно ли?????
                
                $this->container->get('session')->set('user', $cl['user_id']);
                $this->router->redirect('/weather/view');
                
                
                
            } else {
                
                Session::setFlash('Пароль или логин не совпадают');
                
            }
            
             

        }
        
        $this->render('index');
        
    }
    
    
    public function registerAction(Request $request){
        
        
      
        
         if ( $request->getPostKey('name',0)   && $request->getPostKey('email',0) && $request->getPostKey('password',0) ){
            
            $email=$request->getPostKey('email',0);
            
            
            
            
            if($this->container->get('repasitory_man')->get('User')->getUserByEmail($email)){         
                
                Session::setFlash('Пользователь с такой почтой уже зарегестрирован');
                
                
            } else {
                    
                   $request->post['password']=md5(Config::get('salt').$request->post['password']);
                   
                   
                
                  if($this->container->get('repasitory_man')->get('User')->addUser($request->post)){
                   
                    Session::setFlash('Спасибо за регистрацию');
                    
                    
                };
                
            }
            $this->render('index');
        }
    } 
    
    
   public function messageAction(Request $request){
       
       
       
       
       $id=(int)Session::get('user');
       
       $this->data['user']=$this->container->get('repasitory_man')->get('User')->getUserById($id);
       
       if($request->isPost()){
           if($request->post['captcha']==Session::get('captcha')){
               
               if($this->container->get('repasitory_man')->get('Feedback')->addMessage($request->post)){
           
                      Session::setFlash('Cообщение отправлено успешно');
            
           } else {
               
              Session::setFlash('Ошибка отправки , обратитесь к администратору'); 
               
           };
           
           
         } else{
             
             Session::setFlash('Сообщение не отправлено.Введите цифры правильно');  
         }   
           
       }
      
       $this->render();
   }
   
   public function feedbackAction(){
       
      $this->data=$this->container->get('repasitory_man')->get('Feedback')->getFeedbacks();
      
      $this->render();
   }
    
}