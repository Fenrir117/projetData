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
         $var = $this->c_2017NbCompagniesByHandicap();
         $graphInfos['graph2017']['nbCompaniesByHandicaps'] = $var;
        $var = $this->c_2017NbCompaniesByRegion();
         $graphInfos['graph2017']['nbCompaniesByRegion'] = $var;
         $var = $this->c_2017NbCompaniesByHandicapByRegion();
         $graphInfos['graph2017']['nbCompaniesByregionByHandicap'] = $var;
        // var_dump( $var);
       var_dump( $graphInfos);
    }
    // Schéma de $graphInfos :
    // $graphInfos['graph2017']['nbCompaniesByHandicaps']['handicap'] = string 'leNombreDEntreprises';
    // $graphInfos['graph2017']['nbCompaniesByregion']['region'] = string 'leNombreDEntreprises';
    // $graphInfos['graph2017']['nbCompaniesByregionByHandicap']['le nom de la région']['le nom du handicap'] = leNombreDEntreprises;




    // $graphInfos['graph2017']['nbCompaniesByregionByHandicap']['le nom de la région']['le nom du handicap'] = leNombreDEntreprises;
    // $graphInfos['graph2017_2019']['CompanyType']['2017'] = leNombreDEntreprises;
    // $graphInfos['graph2017_2019']['CompanyType']['2019'] = leNombreDEntreprises;
    // $graphInfos['graph2017_2019']['HandicapType']['2017'] = leNombreDEntreprises;
    // $graphInfos['graph2017_2019']['HandicapType']['2019'] = leNombreDEntreprises;


    public function c_2017NbCompagniesByHandicap () { 
        $graphModel = new Graph_Model();
        $response = $graphModel->dbGet2017NbCompagniesByHandicap();
        return $response;
    }


    public function c_2017NbCompaniesByregion () {
        $graphModel = new Graph_Model();
        $response = $graphModel->dbGet2017NbCompaniesByRegion();
        return $response;
    }


    public function c_2017NbCompaniesByHandicapByregion () {
        $graphModel = new Graph_Model();
        $response = $graphModel->dbGet2017NbCompaniesByHandicapByRegion();
        return $response;
    }

    
    // send to view
    function displayView ($twig) {
        echo $twig->render('graph.html.twig');
    }
}