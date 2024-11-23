<?php

namespace App\services;

use mysqli;

class Bbdd {
    private string $user;
    private string $password;
    private string $host;
    private string $database;
    private mysqli $conexion;

    public function __construct(string $user, string $password,string $host, string $database){
       
        $this->user=$user;
        $this->password=$password;
        $this->host=$host;
        $this->database=$database;
    }
    private function getConexion():mysqli|false{
        return new mysqli($this->host,$this->user,$this->password,$this->database);
    }
    
    public function getAll($sql):array{
       
     $bbdd=$this->getConexion();
     $data=[];
     $result=$bbdd->query($sql);
     while($row=mysqli_fetch_assoc($result)){
        $data[]=$row;
     }
     return $data;
    }
        
    public function getOne($sql){
        $data=$this->getAll($sql);
        return count($data)>0 ? $data[0]:[];
    }
    public function insertData($sql){
        $bbdd=$this->getConexion();
        $bbdd->query($sql);
        return $this->getLastId();
    }
    public function getLastId(){
        return $this->conexion->insert_id;
    }
}