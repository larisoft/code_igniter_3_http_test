<?php

//send request
//return response

class TestHttp extends CI_Model{

    public function __construct(){

        parent::__construct();

    }


    public $base_url;


    public function perform_request($method, $url, $params = null){

        $url = $this->base_url.$url;

        if($method =="POST" && is_array($params)){

            return $this->do_post($url, $params);
        }
        else{

            return $this->do_get($url);
        }

    }


    private function do_get($url){
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $response = curl_exec($ch);
       
        curl_close($ch); // Close the connection
       
        return $response;
        
      
    }


    private function do_post($url, $data){

        $post = ['batch_id'=> "2"];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch); 
        curl_close($ch); // Close the connection
         
        return $response;
      

    }
}