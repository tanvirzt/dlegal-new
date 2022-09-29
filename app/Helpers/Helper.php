<?php

if (!function_exists('request_array')){
    function request_array($data){
        $datum = json_decode(json_encode($data));
        echo "<pre>";print_r($datum);die();
    }
}

if (!function_exists('data_array')){
    function data_array($data){
        $datum = json_decode(json_encode($data));
        echo "<pre>";print_r($datum);die();
    }
}

if (!function_exists('auth_id')){
    function auth_id(){
       return Auth::user()->id;
    }
}

if (!function_exists('user_details')){
    function user_details($id){
       return \App\Models\User::where('id', $id)->first();
    }
}

if (!function_exists('companies_all_users')){
    function companies_all_users(){
        return \App\Models\User::where('company_id', Auth::user()->company_id)->pluck('id');
    }
}

if (!function_exists('received_documents')) {
    function received_documents($id)
    {
        return \App\Models\SetupDocument::where('id',$id)->first();
    }
}

if (!function_exists('received_documents_type')) {
    function received_documents_type($id)
    {
        return \App\Models\SetupDocumentsType::where('id',$id)->first();
    }
}

