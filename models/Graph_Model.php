<?php 

class Graph_Model extends Model {
     // defini les constantes
    private static $handicaps = array('mental', 'moteur', 'auditif', 'visuel');
      
      
        // private static $options = array(
        //     'app_id' => 'hello',
        // );
        // public static function config($key){
        //     return self::$options[$key];
        // }

    public function __construct () {
        parent::__construct();        
    }   
    
    
    private function dbGetRegions () { 
        $pdo = parent::dbConnect();       
        /*  DISTINCT so we won't have twice the same region
            WHERE region != '' because one value is missing */
        $query = "SELECT DISTINCT `REGION` FROM `infos` WHERE `REGION` <> '';";
        //$query = "SELECT * FROM `infos` WHERE `REGION` = '';";
        $request = $pdo->prepare($query);
        $request->execute();
        $regions = $request->fetchAll(PDO::FETCH_ASSOC);
        parent::dbDisconnect($pdo);
        return $regions;
    }
 

    public function dbGet2017NbCompagniesByHandicap () {
        $pdo = parent::dbConnect();
        $result = [];
        foreach (self::$handicaps as $handicap) {
            $query = "SELECT COUNT(*) 
                        FROM `infos` 
                        WHERE HANDICAPS LIKE '%$handicap%';";
            $request = $pdo->prepare($query);
            $request->execute();
            $results[$handicap] = $request->fetchColumn();
        }
        parent::dbDisconnect($pdo);
        return $results;
    }

    public function dbGet2017NbCompaniesByRegion () {
        $pdo = parent::dbConnect();
        // first we need listed regions from db 
        /*  DISTINCT so we won't have twice the same region
            WHERE region != '' because one value is missing
        */
    //    $query = "SELECT DISTINCT `REGION` FROM `infos` WHERE `REGION` <> '';";
        //$query = "SELECT * FROM `infos` WHERE `REGION` = '';";
    //    $request = $pdo->prepare($query);
    //    $request->execute();
    //    $regions = $request->fetchAll(PDO::FETCH_ASSOC);
        $regions = self::dbGetRegions();
        //var_dump($request->fetchAll(PDO::FETCH_ASSOC));
        //var_dump($var);
        // now we can launch as many requests as regions
        $results = [];
        for ($i=0; $i < count($regions); $i++) {
           /* echo $i . '<br>';
            echo $var[$i]['REGION'];
            echo '<br>';*/
        //    echo $var[$i] . '<br>';
          //  echo 'poujp';
            $region = $regions[$i]['REGION'];
          //  echo $region;
            $query = "SELECT COUNT(*)
            FROM `infos`
            WHERE REGION LIKE '%$region%';";
            $request = $pdo->prepare($query);
            $request->execute();
            $results[$region] = $request->fetchColumn();
        }
        
        //$results = [];
        
        /*foreach ($regions as $region) {
            $query = "SELECT COUNT(*)
                        FROM `infos`
                        WHERE REGION LIKE '%$region%';";
            $request = $pdo->prepare($query);
            $request->exectute();
            $results[$region] = $request->fetchColumn();
        }*/
        parent::dbDisconnect($pdo);
        return $results;
    }


    public function dbGet2017NbCompaniesByHandicapByRegion () {
        $regions = self::dbGetRegions();
        $pdo = parent::dbConnect();
        for ($i = 0; $i < count($regions); $i++) {
           // var_dump($regions[$i]['REGION']);
            $region = $regions[$i]['REGION'];
            foreach (self::$handicaps as $handicap) {
                $query = "SELECT COUNT(*)
                            FROM `infos`
                            WHERE `REGION` LIKE '%$region%' 
                                AND `HANDICAPS` LIKE '%$handicap%';";
                $request = $pdo->prepare($query);
                $request->execute();
                $results[$region][$handicap] = $request->fetchColumn(); 
            }
        }
        parent::dbDisconnect($pdo);
        return $results;          
    }




    public function dbGetCompare2017_2019NbCompaniesByCompaniesType () {
      //  echo '<br><br>';
       // var_dump ($results);    
    }


    public function dbGetCompare2017_2019NbCompaniesByHandicapType () {
        
    }

}