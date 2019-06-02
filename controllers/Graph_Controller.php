<?php 

// load Controller super class
require_once 'core/Controller.php';

class Graph_Controller extends Controller {

    public function __construct () {
        parent::__construct();
        // load Model child class
        require_once 'models/Graph_Model.php';
    }


    public function c_graph ($twig) {
        $dbTables = array(0 => 'juin2016',
                          1 => 'janvier2017');
        foreach ($dbTables as $dbTable) {
            $var = $this->c_NbCompagniesByHandicap($dbTable);
            $graphInfos[$dbTable]['nbCompaniesByHandicap'] = $var;
            $var = $this->c_NbCompaniesByRegion($dbTable);
            $graphInfos[$dbTable]['nbCompaniesByRegion'] = $var;
            $var = $this->c_NbCompaniesByHandicapByRegion($dbTable);
            $graphInfos[$dbTable]['nbCompaniesByRegionByHandicap'] = $var;
        }
       $this->displayView($graphInfos,$twig);
    }
    // Schéma de $graphInfos : les données reçues par la page
    // $graphInfos[$dbTableName]['nbCompaniesByHandicap'][$handicap] = string 'leNombreDEntreprises';
    // $graphInfos[$dbTableName]['nbCompaniesByRegion'][$region] = string 'leNombreDEntreprises';
    // $graphInfos[$dbTableName]['nbCompaniesByRegionByHandicap'][$region][$handicap] = string 'leNombreDEntreprises';



    public function c_NbCompagniesByHandicap ($_dbTable) { 
        $graphModel = new Graph_Model();
        $response = $graphModel->dbGetNbCompagniesByHandicap($_dbTable);
        return $response;
    }


    public function c_NbCompaniesByregion ($_dbTable) {
        $graphModel = new Graph_Model();
        $response = $graphModel->dbGetNbCompaniesByRegion($_dbTable);
        return $response;
    }


    public function c_NbCompaniesByHandicapByregion ($_dbTable) {
        $graphModel = new Graph_Model();
        $response = $graphModel->dbGetNbCompaniesByHandicapByRegion($_dbTable);
        return $response;
    }

    
    // send to view
    function displayView ($_graphInfos, $twig) {
        echo $twig->render('graph.html.twig', [
            'graphInfos' => $_graphInfos
        ]);
    }
}