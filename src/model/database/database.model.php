<?php 

class Database {
    protected function connect(): PDO {
        try {
            $username = "root";
            $password = "";
            $database = new PDO('mysql:host=localhost; dbname=test', $username, $password);
            return $database;
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}