<?php

   class Conexion {
      private $conexion;
      private $driver = "mysql";
      private $host = "localhost";
      private $port = "3306";
      private $user = "root";
      private $dataBase = "test_s2next";
      private $password = "";
      private $charset = "utf8";

      function __construct() {

      }

      public function connect() {
         $stm = "{$this->driver}:host={$this->host}:{$this->port};dbname={$this->dataBase};charset={$this->charset}";
         $this->conexion = new PDO($stm, $this->user, $this->password);
         return $this->conexion;
      }
   }




