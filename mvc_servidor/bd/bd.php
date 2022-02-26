<?php
class bd{
    protected $bbdd = "concierto";    
    protected $username = "root";
    protected $password = "1234";
    protected $conexion;

    public function __construct(){
        $this->conexion = new PDO('mysql:host=localhost;dbname='.$this->bbdd, $this->username, $this->password);
    }
}