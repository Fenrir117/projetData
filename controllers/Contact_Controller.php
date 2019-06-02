<?php 

// load Controller super class
require_once 'core/Controller.php';

class Contact_Controller extends Controller {

    public function __construct () {
        parent::__construct();
    }


    public function c_contact ($twig) {
        $this->displayView($twig);
    }

    
    // send to view
    function displayView ($twig) {
        echo $twig->render('contact.html.twig');
    }

}