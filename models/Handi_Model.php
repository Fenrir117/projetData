<?php

class Handi_Model extends Model  {

    private static $dbTable = "janvier2017";


    public function __construct () {
        parent::__construct();
    }


    // we need all locations
    public function dbGetAll () {        
        // connect to database
        $pdo = parent::dbConnect();
        // the query
        $query = "SELECT `CID`, `LATITUDE`, `LONGITUDE` , `ETABLISSEMENT`, `ACTIVIT` , `HANDICAPS`
                 FROM `" . self::$dbTable. "`  limit 10;";
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


    public function dbGetCompany ($_type){
        // connect to database
        $pdo = parent::dbConnect();
        // the query
        $query = "SELECT `CID` , `ETABLISSEMENT` , `ACTIVIT` , `HANDICAPS` , `LATITUDE`, `LONGITUDE`
                    FROM `" . self::$dbTable. "`
                    WHERE `ACTIVIT`= $_type;";
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

    
    public function  dbGetHandi ($_type){
        // connect to database
        $pdo = parent::dbConnect();
        // the query
        $query = "SELECT `CID` , `ETABLISSEMENT` , `ACTIVIT` , `HANDICAPS` , `LATITUDE`, `LONGITUDE`
                    FROM `" . self::$dbTable. "`
                    WHERE `HANDICAPS`= $_type;";
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


    public function  dbGetZoom ($_CID){
        // connect to database
        $pdo = parent::dbConnect();
        // the query
        $query = "SELECT `CID`, `ETABLISSEMENT`, `ACTIVIT` ,`HANDICAPS`, `CONTACT`, `EMAILCONTACT`, `SITEWEB`, `TELEPHONE`, `ADRESSE`, `CODEPOSTAL`, `VILLE` 
                    FROM `" . self::$dbTable. "`
                    WHERE `CID`= $_CID;";
                    // prepare the query
        $request = $pdo->prepare($query);
        // launch the query
        $request->execute();
        // put the request result in an array
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        // disconnect from database
        parent::dbDisconnect($pdo);
        // return the result
        return $result;
    }
    
    
    // $_filter is the $_POST
    public function dbGetFilter ($_filter){
        $where = '';
        $pdo = parent::dbconnect();
        if (isset($_filter['activite']) ){
            switch($_filter['activite']){
                case "Hôtel" : 
                    $where .="`ACTIVIT` LIKE 'Hôtel'";
                    break;
                case "Restaurant" :
                    $where .= "`ACTIVIT` = 'Restaurant' OR `ACTIVIT` = 'Hôtel-restaurant' ";
                    break;
                default:
                    $where .= "`ACTIVIT` =" .$_filter['activite'];
            }
        }
        
        if (isset($_filter['handicap']) ){
            if ($where !== '' ) {
            $where.= " AND ";
            }
            $handi = explode("_", $_filter['handicap']);
            $handiLength = count($handi);
            for($i = 0; $i < $handiLength; $i++) {
                $where .= "`HANDICAPS` LIKE " .$handi[$i];
                
                if($i !== ($handiLength - 1)) {
                    $where .= " AND ";
                }
            }
        } 
        $where .= ";";
        $query = "SELECT `CID` , `ETABLISSEMENT` , `ACTIVIT` , `HANDICAPS` ,  , `CONTACT` , `EMAILCONTACT` , `SITEWEB` , `TELEPHONE` , `FAX` , `ADRESSE` , `CODEPOSTAL` , `VILLE` 
        FROM `" . self::$dbTable. "`
        WHERE " . $where ;
    }    
}
