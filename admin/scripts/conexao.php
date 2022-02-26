<?php
  class Database {

    function db_mysql() {try {

        $conn = new \PDO("mysql:host=localhost;dbname=helppet", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        return $conn;
      } catch(\PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    }
    
  }
// $conn= new Database();
// $conn = $conn->db_mysql();
?>