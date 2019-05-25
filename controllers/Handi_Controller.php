<?php

// load Controller super class
require_once 'core/Controller.php';

class Handi_Controller extends Controller {

    public function __construct () {
        // load Model super class
        parent::__construct();
        // load Model child class
        require_once 'models/Handi_Model.php';
    }

    // want to display all marker on map
    public function c_GetAll () {
        // build a new model object
        $handiModel = new Handi_Model();
        // get data from model
        $response = $handiModel->dbGetAll();
        // build view 
        // marche pas pour l'instant
        // $this->displayView($response);
        // donc on y va comme ça en attendant de trouver une soluce
        return $response;
    }

    // marche pas pour l'instant
    // send to view
    function displayView ($_response) {
        // twig
        require_once 'vendor/autoload.php';        
        $loader = new \Twig\Loader\FilesystemLoader('views');
        $twig = new \Twig\Environment($loader);
        // build view        
        echo $twig->render('layout.html.twig', [
            'response' => $_response,
            'test' => "ok"
        ]);
    }
}