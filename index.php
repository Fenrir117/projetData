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




// twig
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader);



// router
switch ($parts[3]) {
    case '':
        require_once 'controllers/Home_Controller.php';
        $homeController = new Home_Controller();
        $homeController->c_home($twig);
        break;
    case '/':
        require_once 'controllers/Home_Controller.php';
        $homeController = new Home_Controller();
        $homeController->c_home($twig);
        break;
    case 'accueil':
        require_once 'controllers/Home_Controller.php';
        $homeController = new Home_Controller();
        $homeController->c_home($twig);
        break;
    case 'graph':
        require_once 'controllers/Graph_Controller.php';
        $graphController = new Graph_Controller();
        $graphController->c_graph($twig);
        break;
    case 'contact':
        require_once 'controllers/Contact_Controller.php';
        $contactController = new Contact_Controller();
        $contactController->c_contact($twig);   
        break;
    // EN ATTENDANT LE CAS CHOISI EN GROUPE :
    case 'all':
        require_once 'controllers/Handi_Controller.php';
        $handiController = new Handi_Controller();
        $handiController->c_GetAll($twig);
        break;
    case 'zoom':
        // require_once 'controllers/zoom.php';
        require_once 'controllers/Handi_Controller.php';
        $handiController = new Handi_controller();
        $handiController->c_GetZoom($_POST['cid'], $twig);
        break; 
    // case 'filtre':
    //     require_once 'controllers/Handi_Controller.php';
    //     $handiController = new Handi_controller();
    //     $result = $handiController->c_GetFilter($_POST);
    //     echo $twig->render('layout.html.twig', [
    //         'result' => $result,
    //         'test' => "ok"
    //     ]);
    //     break;
    default:
                    
        header("Location: http://localhost/projet_018_data/app/views/404.html"); /* Redirection du navigateur */

        /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
        exit;
}

// ROUTER 
// nomDeLaFunction();

//CONTROLLER
// function nomDeLaFunction(){
//CHARGEMENTDU MODEL
//RECUPERATION DES DONNEES
// CHARGEMENT DE LA VIEW + DONNEES  
// }

//MODEL
//connexion BDD
// REQUETE SQL
// STOCKAGE DES DONNES DANS UNE VARIABLE
//FERMETURE BDD






