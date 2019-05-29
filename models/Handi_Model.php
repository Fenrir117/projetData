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
        $query = "SELECT `CID`, `LATITUDE`, `LONGITUDE` , `ETABLISSEMENT`, `ACTIVIT` , `HANDICAPS`
                 FROM `infos` limit 10;";
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
                    FROM `infos`
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
                    FROM `infos`
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
                    FROM `infos`
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
                
                if($i !== ($handilength - 1)) {
                    $where .= " AND ";
                }
            }
        } 
        $where .= ";";
        $query = "SELECT `CID` , `ETABLISSEMENT` , `ACTIVIT` , `HANDICAPS` ,  , `CONTACT` , `EMAILCONTACT` , `SITEWEB` , `TELEPHONE` , `FAX` , `ADRESSE` , `CODEPOSTAL` , `VILLE` 
        FROM `infos`
        WHERE " . $where ;
    }    
}

// $where = '';
// $handicaps = explode('_', $_POST['handicaps']);
// $handiLength = count($handicaps);
// for ($i = 0; $i < $handiLength; $i++) {
//     if ($i !== 0) {
//         $where .= ' AND ';
//     }
//     $where .= " `HANDICAPS` LIKE " . $handicaps[$i];
// }

// $query = "SELECT `CID`, `LATITUDE`, `LONGITUDE`
//             FROM `infos`
//             WHERE " . $where . ";";



/* needed requests */
/* 
    _ toutes : CID, Nom établissement, activité, type handi, longitude, latitude
    _ type établissement: CID, Nom établissement, activité, type handi, longitude, latitude 
    _ type handicap: CID, Nom établissement, activité, type handi, longitude, latitude 
    _ zoom établissement: CID, etablissement, contact, email contact, site web, telephone, fax ?, 
                    type handicap, code postal, adresse, ville, activité
*/

