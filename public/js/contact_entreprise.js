// Script faire apparaitre le formulaire de contact de l'entreprise
// variable de la section qui comporte le formulaire de contact des entreprise
var contactEntreprise = document.querySelector('.contactNone');
// Variable du bouton qui va faire apparaitre la section de contact
var button = document.querySelector('.contactSociete');
// Ajout de l'evenement au Click
button.addEventListener("click", loadContact);
// Function qui fait apparaitre le formulaire
function loadContact(){
    contactEntreprise.style.display = "block";
}

var styleContainerMap = document.querySelector('.contentMap');



// Script pour passer le site en Gaucher
var gaucher = document.querySelector('.gaucher');
var styleNavbarGaucher = document.querySelector('.navbarGauche');
var styleMenuHeaderGauche = document.querySelector('.menuHeaderGauche');
gaucher.addEventListener("click", siteGaucher);
// fonction qui change le style
function siteGaucher(){
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
function siteDroitier(){
    styleContainerMap.style.flexDirection = "row";
    styleNavbarDroitier.style.flexDirection = "row";
    styleMenuHeaderDroite.style.justifyContent = "flex-end";
}



// Script affichage de ma map


// Variable de ma map
var mymap = L.map('myMap').setView([46.866313, 5.022708], 5.70);
L.tileLayer('https://api.mapbox.com/styles/v1/fenrir117/cjw1qta3m04ey1co2ypm3gcaf/tiles/256/{z}/{x}/{y}?&access_token=pk.eyJ1IjoiZmVucmlyMTE3IiwiYSI6ImNqdzFxaXZqYzBtb3A0M28yaGkxOTFtMzMifQ.UBw6HvivdCZjz2ZY2uipmA#10.0/42.362400/-71.020000/0}'
, {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiZmVucmlyMTE3IiwiYSI6ImNqdzFxaXZqYzBtb3A0M28yaGkxOTFtMzMifQ.UBw6HvivdCZjz2ZY2uipmA'
}).addTo(mymap);

var lat = 47;
var long = 6;

// ajout point sur la map
var marker = L.marker([lat, long]).addTo(mymap);


// var x = window.matchMedia("(max-width: 991px)").matches;
var test = document.querySelector('.DMLA');
var card = document.querySelector('.cardSearch');
test.addEventListener("click", broly);


if (window.matchMedia("(max-width: 991px)").matches) {    
    console.log('ceqrghsqoucou');
    card.style.transform = "translateX(50%)";
 
}

   function broly() {
console.log('ssj');
}
// function translate() {
// card.style.transform = "translateX(50%)";
// console.log('coucou');
//  }
















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


