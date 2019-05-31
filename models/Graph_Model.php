<?php 

class Graph_Model extends Model {
    // define constants
    private static $handicaps = array('mental', 'moteur', 'auditif', 'visuel');
      
      

    public function __construct () {
        parent::__construct();        
    }   
    
    
    private function dbGetRegions ($_dbTable) { 
        $pdo = parent::dbConnect();       
        /*  DISTINCT so we won't have twice the same region
            WHERE region != '' because one value is missing */
        $query = "SELECT DISTINCT `REGION` FROM $_dbTable WHERE `REGION` <> '';";
        $request = $pdo->prepare($query);
        $request->execute();
        $regions = $request->fetchAll(PDO::FETCH_ASSOC);
        parent::dbDisconnect($pdo);
        return $regions;
    }
 

    public function dbGetNbCompagniesByHandicap ($_dbTable) {
        $pdo = parent::dbConnect();
        $result = [];
        foreach (self::$handicaps as $handicap) {
            $query = "SELECT COUNT(*) 
                        FROM $_dbTable 
                        WHERE HANDICAPS LIKE '%$handicap%';";
            $request = $pdo->prepare($query);
            $request->execute();
            $results[$handicap] = $request->fetchColumn();
        }
        parent::dbDisconnect($pdo);
        return $results;
    }

    public function dbGetNbCompaniesByRegion ($_dbTable) {
        $pdo = parent::dbConnect();
        // first we need listed regions from db 
        $regions = self::dbGetRegions($_dbTable);
        $results = [];
        for ($i=0; $i < count($regions); $i++) {
            $region = $regions[$i]['REGION'];
            $query = "SELECT COUNT(*)
            FROM $_dbTable
            WHERE REGION LIKE '%$region%';";
            $request = $pdo->prepare($query);
            $request->execute();
            $results[$region] = $request->fetchColumn();
            echo '<br>';             
            echo $_dbTable;            
            echo $region;
            echo '<br>';
        }
        parent::dbDisconnect($pdo);
        return $results;
    }
    

    public function dbGetNbCompaniesByHandicapByRegion ($_dbTable) {
        $regions = self::dbGetRegions($_dbTable);
        $pdo = parent::dbConnect();
        $results = [];
        for ($i = 0; $i < count($regions); $i++) {
            $region = $regions[$i]['REGION'];
            foreach (self::$handicaps as $handicap) {
                $query = "SELECT COUNT(*)
                            FROM $_dbTable
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
}