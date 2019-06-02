<?php

// load Controller super class
require_once 'core/Controller.php';

class Handi_Controller extends Controller {

    public function __construct () {
        // load Controller super class
        parent::__construct();
        // load Model child class
        require_once 'models/Handi_Model.php';
    }


    // want to display all marker on map
    public function c_GetAll ($twig) {
        echo 'lughl';
        // build a new model object
        $handiModel = new Handi_Model();
        // get data from model
        $response = $handiModel->dbGetAll();
        // build view 
        $this->displayView($response, $twig);
    }
    
    
    // want to display all marker on map
    public function c_GetZoom ($_CID, $twig) {
        // build a new model object
        $handiModel = new Handi_Model();
        // get data from model
        $result = $handiModel->dbGetZoom($_CID);

        $zoomInfos = $result[0];
        // build view 
        $template = $twig->load('main.html.twig');
        echo $template->renderBlock('blockZoom', 
                        ['etablissement' => $zoomInfos['ETABLISSEMENT'],
                        'activite' => $zoomInfos['ACTIVIT'],
                        'telephone' => $zoomInfos['TELEPHONE'],
                        'adresse' => $zoomInfos['ADRESSE'],
                        'codePostal' => $zoomInfos['CODEPOSTAL'],
                        'ville' => $zoomInfos['VILLE'],
                        'email' => $zoomInfos['EMAILCONTACT'],
                        'handicaps' => $zoomInfos['HANDICAPS']
                        ]);
    }



    public function c_GetFilter ($_filter, $twig){
        $handiModel = new Handi_Model();
        // get data from model
        $response = $handiModel->dbGetFilter($_filter);
        // build view 
        $this->displayView($response, $twig);
    }



    // send to view
    function displayView ($_response, $twig) {
        // build view        
        echo $twig->render('main.html.twig', [
            'result' => $_response,
        ]);
    }
}




