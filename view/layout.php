<!doctype html>
<html lang="fr_FR">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Lien font-awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Lien pour leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>
  <!-- Lien du css -->
  <!-- <?php 
// Check if VioK Team member Part 2 is included inside header.php
// include $_SERVER['DOCUMENT_ROOT'] . "projetData-Circus-Pygargus/public/css/style.css";
?> -->
<!-- echo dirname(__FILE__) . '/view/public/css/style.css';  -->

  <link rel="stylesheet" href="public/css/style.css">
  <title>Projet Data</title>
</head>

<body>

  <header>
    <!-- Navbar fixe du site  -->
    <nav class="navbar navbar-expand-lg navbar-light w-100 justify-content-around">
      <!-- Logo, enseigne du site -->
      <a class="navbar-brand" href="#">Navbar</a>
      <!-- Bouton qui apparait seulement sur version tablet et mobile en cliquant le menu apparait -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Menu du site -->
      <div class="menuHeader collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Graphique</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Menu pour choisir l'accessibilité du site -->
    <div class="choiceVersion">
      <p>Accesibilité du site</p>
      <ul>
        <li class="nav-item active">
          <a class="nav-link" href="#">Droitier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gaucher</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">DMLA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Mal-Voyant</a>
        </li>
      </ul>
    </div>
  </header>

  <!-- Section avec la map et les informations liées à l'etablissement choisit -->
  <section class="container-fluid">
    <div class="container">
      <!-- Titre principal du site -->
      <h1>Titre du site</h1>
      <div class="row">
        <!-- Cadre avec les informations de l'etablissement -->
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-0 cardSearch">
          <h2>Information sur société labelisé</h2>
          <div class="nameInfos">
            <h3>Etablissement</h3>
            <p>Activités</p>
          </div>
          <img class="img-fluid" src="" alt="">
          <div class="adressInfos">
            <p>Adresse</p>
            <p>Code postale</p>
            <p>Ville</p>
            <button class="contactSociete">Contacter l'Entreprise</button>
          </div>
        </div>
        <!-- Map de navigation -->
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-0 mapApi" id="myMap">

        </div>
      </div>
    </div>
  </section>

  <!-- Section Formulaire pour contacter les entreprise -->
  <section class="container-fluid contactNone">
    <div class="container">
      <h3>Etablissement</h3>
      <form class="row" action="formSociete" method="POST">
        <div class="col-4 inputForm">
          <input type="text" placeholder="Nom">
          <input type="text" placeholder="Téléphone">
          <input type="text" placeholder="E-mail">
        </div>
        <div class="col-8 textareaForm">
          <textarea name="message" id="messagSociete" cols="30" rows="10" placeholder="Message"></textarea>
          <button>Envoyer</button>
        </div>

      </form>
    </div>
  </section>

  <footer class="container-fluid">
    <div class="container">
      <div class="row">
<div class="titleFooterElement"></div>
        <div class="col-4 copyright">
            <div class="titleFooterElement"><p>test</p></div>

          <p>Copyright 2019</p>
          <a href="#">Mention légal</a>
        </div>
        <div class="col-4 infoFooter">
            <div class="titleFooterElement"><p>test</p></div>

          <a href="#">Base de données</a>
          <a href="#">Charte Graphique</a>
        </div>
            <div class="col-4 socialNetwork">
                <div class="titleFooterElement"><p>test</p></div>

              <div class="nom">
                <p>Richard</p>
                <p>Julien</p>
                <p>Jessy</p>
              </div>
              <div class="github">
                  <a href="#"><i class="fab fa-github"></i></a>
                  <a href="#"><i class="fab fa-github"></i></a>
                  <a href="#"><i class="fab fa-github"></i></a>
              </div>
              <div class="linkedin">
                  <a href="#"><i class="fab fa-linkedin-in"></i> </a>
                  <a href="#"><i class="fab fa-linkedin-in"></i> </a>
                  <a href="#"><i class="fab fa-linkedin-in"></i> </a>
              </div>
            </div>
        </div>
      </div>
    </div>

  </footer>
<!-- HTML -->



<!-- Javascript pour leaflet -->
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
  integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
  crossorigin=""></script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
    <script src="public/js/contact_entreprise.js"></script>
</body>

</html>