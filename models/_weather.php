<?php

class _Weather{
    
    
 public function parse(){
     
     $client = new GuzzleHttp\Client();
       require_once(LIB_DIR.DS."simple_html_dom.php");
      
       $res = $client->request('GET', 'https://www.gismeteo.ua/ua/weather-zaporizhia-5093/',
       [
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
                'Content-Type' => 'html/text; charset=utf8',
                'Accept' => '*/*',
                'Accept-Language' => 'ru-RU,ru;q=0.8,hi;q=0.6,und;q=0.4',
                'cookies' => true
            ],
            
        ]
       
       
       );
       
      $body = $res->getBody()->getContents();
      $html = str_get_html($body);
      return $html->getElementById('weather');
      
      
     
     
     
 }   
    
    
    
    
}