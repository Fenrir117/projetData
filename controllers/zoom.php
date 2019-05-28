<?php 

$zoom = new Handi_Controller();
$zoomInfos = $zoom->c_GetZoom($_POST['cid']);
// echo $zoomInfos;

// twig
require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader);


$template = $twig->load('main.html.twig');
echo $template->renderBlock('block_name_parEx_zoom', ['zoomInfos' => $zoomInfos]);