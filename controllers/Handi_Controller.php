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
        // marche pas pour l'instant
        $this->displayView($response, $twig);
        // donc on y va comme ça en attendant de trouver une soluce
        // return $response;
    }
    
    
    // want to display all marker on map
    public function c_GetZoom ($_CID, $twig) {
        // build a new model object
        $handiModel = new Handi_Model();
        // get data from model
        $result = $handiModel->dbGetZoom($_CID);

        $zoomInfos = $result[0];
        // build view 
        // marche pas pour l'instant
        // $this->displayView($response);
        // donc on y va comme ça en attendant de trouver une soluce
        // return $response;
        // var_dump($zoomInfos['HANDICAPS']);
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
        // marche pas pour l'instant
        $this->displayView($response, $twig);
        // donc on y va comme ça en attendant de trouver une soluce
        // return $response;
    }



    // marche pas pour l'instant
    // send to view
    function displayView ($_response, $twig) {
        // twig
        // require_once 'vendor/autoload.php';        
        // $loader = new \Twig\Loader\FilesystemLoader('views');
        // $twig = new \Twig\Environment($loader);
        // build view        
        echo $twig->render('main.html.twig', [
            'result' => $_response,
        ]);
        // echo $twig->render('main.html.twig', [
        //     'result' => $result, 
        //     'titi' => 'totobabar'
        // ]);
    }



    // public function c_GetCompany ($_type) {
        // build a new model object
        // $handiModel = new Handi_Model();
        // get data from model
        // $response = $handiModel->dbGetCompany($_type);
        // build view 
        // marche pas pour l'instant
        // $this->displayView($response);
        // donc on y va comme ça en attendant de trouver une soluce
        // return $response;
    // }
    // public function c_GetHandi ($_type) {
        // build a new model object
        // $handiModel = new Handi_Model();
        // get data from model
        // $response = $handiModel->dbGetHandi($_type);
        // build view 
        // marche pas pour l'instant
        // $this->displayView($response);
        // donc on y va comme ça en attendant de trouver une soluce
        // return $response;
    // }



}




