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
        // var_dump( $var);
       var_dump( $graphInfos);
    }
    // Schéma de $graphInfos : les données reçues par la page
    // $graphInfos[$dbTableName]['nbCompaniesByHandicap'][$handicap] = string 'leNombreDEntreprises';
    // $graphInfos[$dbTableName]['nbCompaniesByRegion'][$region] = string 'leNombreDEntreprises';
    // $graphInfos[$dbTableName]['nbCompaniesByRegionByHandicap'][$region][$handicap] = string 'leNombreDEntreprises';



    

    // $graphInfos['2017']['nbCompaniesByHandicap']['handicap'] = string 'leNombreDEntreprises';
    // $graphInfos['2017']['nbCompaniesByregion']['region'] = string 'leNombreDEntreprises';
    // $graphInfos['2017']['nbCompaniesByregionByHandicap']['le nom de la région']['le nom du handicap'] = leNombreDEntreprises;
    // $graphInfos['2017']['nbCompaniesByregionByHandicap']['le nom de la région']['le nom du handicap'] = leNombreDEntreprises;
    // $graphInfos['2019']['CompanyType']['2017'] = leNombreDEntreprises;
    // $graphInfos['2019']['CompanyType']['2019'] = leNombreDEntreprises;
    // $graphInfos['2019']['HandicapType']['2017'] = leNombreDEntreprises;
    // $graphInfos['2019']['HandicapType']['2019'] = leNombreDEntreprises;





    // $graphInfos['graph2017']['nbCompaniesByregionByHandicap']['le nom de la région']['le nom du handicap'] = leNombreDEntreprises;
    // $graphInfos['graph2017_2019']['CompanyType']['2017'] = leNombreDEntreprises;
    // $graphInfos['graph2017_2019']['CompanyType']['2019'] = leNombreDEntreprises;
    // $graphInfos['graph2017_2019']['HandicapType']['2017'] = leNombreDEntreprises;
    // $graphInfos['graph2017_2019']['HandicapType']['2019'] = leNombreDEntreprises;


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
    function displayView ($twig) {
        echo $twig->render('graph.html.twig');
    }
}