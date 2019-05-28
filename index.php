<?php

// get the url in address bar
$uri = $_SERVER['REQUEST_URI'];
// fill the array $parts with each folder name found in url
$parts = explode('/', rtrim($uri, '/'));
// used to know $parts content 
// print_r($parts);
// $parts[3] because $parts[2] is "app"
// if $parts[3] doesn't exists
if (!array_key_exists(3, $parts)) {
    // fill it with nothing; now it exists
    $parts[3] = array(6 => "");
}




// cette partie devrait virer dans le contrôleur
// twig
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader);



// router
switch ($parts[3]) {
    case '':
        // AFFICHER LA PAGE D'ACCUEIL
        break;
    case '/':
        // AFFICHER LA PAGE D'ACCUEIL
        break;
    case 'accueil':
        // AFFICHER LA PAGE D'ACCUEIL
        break;
    // EN ATTENDANT LE CAS CHOISI EN GROUPE :
    case 'all':
        require_once 'controllers/Handi_Controller.php';
        $handiController = new Handi_Controller();
        // à utiliser une fois le twig dans le contrôleur
        $handiController->c_GetAll($twig);
        // en attendant
        // $result = $handiController->c_GetAll();
        // cette partie devrait virer dans le contrôleur
        // echo $twig->render('main.html.twig', [
        //     'result' => $result, 
        //     'titi' => 'totobabar'
        // ]);
        break;
        // case 'etablissement':
        //     require_once 'controllers/Handi_Controller.php';
        //     $handiController = new Handi_Controller();
        //     $result = $handiController->c_GetCompany($parts[4]);
        //     echo $twig->render('layout.html.twig', [
        //         'result' => $result,
        //         'test' => "ok"
        //     ]);
        // break;
        // case 'handicap':
        //     require_once 'controllers/Handi_Controller.php';
        //     $handiController = new Handi_controller();
        //     $result = $handiController->c_GetHandi($parts[5]);
        //     echo $twig->render('layout.html.twig', [
        //         'result' => $result,
        //         'test' => "ok"
        //     ]);
        // break;
    case 'zoom':
        require_once 'controllers/Handi_Controller.php';
        $handiController = new Handi_controller();
        $result = $handiController->c_GetZoom($parts[6]);
        echo $twig->render('layout.html.twig', [
            'result' => $result,
            'test' => "ok"
        ]);
        break;
    case 'filtre':
        require_once 'controllers/Handi_Controller.php';
        $handiController = new Handi_controller();
        $result = $handiController->c_GetFilter($_POST);
        echo $twig->render('layout.html.twig', [
            'result' => $result,
            'test' => "ok"
        ]);
        break;
    default:
        // FAIRE UNE PAGE 404
        // EN ATTENDANT 
        echo 'ERREUR 404';
}

// ROUTER 
// nomDeLaFunction();

//CONTROLLER
// function nomDeLaFunction(){
//CHARGEMENTDU MODEL
//RECUPERATION DES DONNEES
// CHARGEMENT DE LA VIEW + DONNEES  // marche pas pour l'instant, obligé de faire depuis index.php
// }

//MODEL
//connexion BDD
// REQUETE SQL
// STOCKAGE DES DONNES DANS UNE VARIABLE
//FERMETURE BDD






