<?php

if (!function_exists('request_array')){
    function request_array($data){
        $datum = json_decode(json_encode($data));
        echo "<pre>";print_r($datum);die();
    }
}

if (!function_exists('auth_id')){
    function auth_id(){
       return Auth::user()->id;
    }
}

