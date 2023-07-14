<?php

namespace App\service;

class SalleReserver {
    public function __construct()
    {}
    
    public static function getAllSellerInfo($id){
        $sql = "SELECT * FROM saller Where id = $id";
        return $sql;
        }

 
        
}