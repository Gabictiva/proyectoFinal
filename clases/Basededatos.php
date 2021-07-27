<?php

//$conex = mysqli_connect("localhost","root","","veterinaria"); 

class Basededatos {
    /* atributos de la clase -*/
    private $host;
    private $user;
    private $pass;
    private $db;
    private $conn;


    public function __construct(){
        $this->user = 'root';
        $this->pass = '';
        $this->host = 'localhost';
        $this->db = 'veterinaria';
    }

    public function conectaDB(){
        //Abre conexión con db 
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if($this->conn->connect_errno){
            die("Error de conexión: (" . $this->conn->connect_error. ") " . $this->conn->connect_errno);
        }

    }

    public function cerrarDB(){
        //cierra conexión con db
        $this->conn->close();
    }

    public function ejecutar($sql){
        $result = $this->conn->query($sql);
        return $result;
    }

    public function filas(){
        return $this->conn->affected_rows;
    }

    public function mostrar_filas($result){
        return $result->fetch_assoc();
        
    }

    public function clear_query($result){
        $result->free_result();
    }

   

} 

?>