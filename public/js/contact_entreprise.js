// Déclare mes variables
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

var mymap = L.map('myMap').setView([46.866313, 5.022708], 5.70);

L.tileLayer('https://api.mapbox.com/styles/v1/fenrir117/cjw1qta3m04ey1co2ypm3gcaf/tiles/256/{z}/{x}/{y}?&access_token=pk.eyJ1IjoiZmVucmlyMTE3IiwiYSI6ImNqdzFxaXZqYzBtb3A0M28yaGkxOTFtMzMifQ.UBw6HvivdCZjz2ZY2uipmA#10.0/42.362400/-71.020000/0}'
, {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiZmVucmlyMTE3IiwiYSI6ImNqdzFxaXZqYzBtb3A0M28yaGkxOTFtMzMifQ.UBw6HvivdCZjz2ZY2uipmA'
}).addTo(mymap);


