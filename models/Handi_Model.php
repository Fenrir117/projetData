<?php

class Handi_Model extends Model  {

    public function __construct () {
        parent::__construct();
    }

    // get all markers
    // public function dbGetAll ($pdo) {
    //     $query = "SELECT `CID`, `LATITUDE`, `LONGITUDE`
    //                 FROM `infos`;";
    //     $request = $pdo->prepare($query);
    //     $request->execute();
    //     $result = $request->fetchAll();
    //     return $result;
    // }

    // we need all locations
    public function dbGetAll () {
        // connect to database
        $pdo = parent::dbConnect();
        // the query
        $query = "SELECT `CID`, `LATITUDE`, `LONGITUDE`
                    FROM `infos`;";
        // prepare the query
        $request = $pdo->prepare($query);
        // launch the query
        $request->execute();
        // put the request result in an array
        $result = $request->fetchAll();
        // return the result
        return $result;
        // disconnect from database
        parent::dbDisconnect($pdo);
    }
}