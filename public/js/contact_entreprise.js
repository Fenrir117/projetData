// Script faire apparaitre le formulaire de contact de l'entreprise
// variable de la section qui comporte le formulaire de contact des entreprise

var contactEntreprise = document.querySelector('.contactNone');
// cesz deux lignes sont déportées dans main.html.twig dans la fonction zoomRequest()
// Variable du bouton qui va faire apparaitre la section de contact
// var button = document.querySelector('.contactSociete');
// Ajout de l'evenement au Click
// button.addEventListener("click", loadContact);
// Function qui fait apparaitre le formulaire
function loadContact() {
    contactEntreprise.style.display = "block";
}

var styleContainerMap = document.querySelector('.contentMap');



// Script pour passer le site en Gaucher
var gaucher = document.querySelector('.gaucher');
var styleNavbarGaucher = document.querySelector('.navbarGauche');
var styleMenuHeaderGauche = document.querySelector('.menuHeaderGauche');
gaucher.addEventListener("click", siteGaucher);
// fonction qui change le style
function siteGaucher() {
    styleContainerMap.style.flexDirection = "row-reverse";
    styleNavbarGaucher.style.flexDirection = "row-reverse";
    styleMenuHeaderGauche.style.justifyContent = "flex-start";
}


// Script pour passer le site en Droitier
var droitier = document.querySelector('.droitier');
var styleNavbarDroitier = document.querySelector('.navbar');
var styleMenuHeaderDroite = document.querySelector('.menuHeader');
droitier.addEventListener("click", siteDroitier);
// fonction qui change le style
function siteDroitier() {
    styleContainerMap.style.flexDirection = "row";
    styleNavbarDroitier.style.flexDirection = "row";
    styleMenuHeaderDroite.style.justifyContent = "flex-end";
}




 















// Requete xhr ajax
// document.querySelector('form').addEventListener('submit',function(){
//     event.preventDefault();

//     var xhr = new XMLHttpRequest(); // jusqu'a IE7 (entreprise ont minimum IE11)
//     xhr.open('POST', 'assets/php/calcul.php?'); // pour GET c'est une autre methode 
//     var data = new FormData();
//     data.append('num', document.querySelector('#num').value); // créer data.append pour chaque donnée 
//     xhr.onload = function(){
//         document.getElementById("resultat").innerHTML = this.responseText;         
//     }

//     xhr.send(data);
//     });

// var variableRecup = '<?php echo json_encode($monTableauToutBeauEnJson); ?>';
// console.log(variableRecup);


