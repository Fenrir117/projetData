<?php 

// load Controller super class
require_once 'core/Controller.php';

class Home_Controller extends Controller {

    public function __construct () {
        parent::__construct();
    }


    public function c_home ($twig) {
        $this->displayView($twig);
    }

    
    // send to view
    function displayView ($twig) {
        echo $twig->render('accueil.html.twig');
    }

}