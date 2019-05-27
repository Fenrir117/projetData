<?php

class Model {
    

    public function __construct() {        
    }

    // connection to database
    public function dbConnect() {
        $cfg = include('core/config/database.php');
        // echo $cfg;
        try {
            $db = new PDO($cfg['db']['type'] . ":host=" . $cfg['db']['hostname'] . ";dbname=" . $cfg['db']['dbname'] . "; charset=UTF8", $cfg['db']['username'], $cfg['db']['password']);
            return $db;
        } catch (PDOException $e) {
            die("DB ERROR: " . $e->getMessage());
        }
    }
 
    // Disconnection from database
    public function dbDisconnect($_db) {
        $_db = null;
    }


}

?>
