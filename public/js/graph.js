// on trouve l'élément parent dans le html existant 
//var motherDiv = document.querySelector('#regions2017');
// on crée une div dans le html
//var regionGraph = document.createElement('div');
// on lui donne un attribut id
//regionGraph.id = 'maDivDeGraph';
// on fait de la nouvelle div un enfant direct de la div de base
//motherDiv.appendChild(regionGraph);  
// dans la page web le code ressemble maintenant à
//<div id="regions2017">
//    <div id="maDivDeGraph"></div>
//</div>
// on peut aussi virer une div, la div disparait du html :
//    motherDiv.removeChild(regionGraph);
 //   mainetnant il reste en html
//<div id="regions2017"></div>


    // la seule chose qui nous intéresse pour le 1er graph
    // $graphInfos[$dbTableName]['nbCompaniesByRegion'][$region] = string 'leNombreDEntreprises';
    // ici [$dbTableName] c'est forcément ['janvier2017'] donc 
   // $graphInfos['janvier2017']['nbCompaniesByRegion'] à chaque fois qu'on veut une donnée du graph
   // reste plus qu'à lister les régions
   // faudrait truver comment en js on chope une clé d'array
   // on veut choper le nom de la région et son nombre pour les afficher $region est la clé ou key
   // ici on a pas des nombres dans les [] c'est que du texte, on peut donc pas faire un for ($i=0;...)
   // car $graphInfos[0] n'existe pas ... tu captes ?
   // et ce truc dans les [] est appelé la clé elle donne accès à un élément, comme ça
   // déclaration : 
   // $monArray = {key: element,
   //             'maCleQueJappelleCommejeVeux': 'un string' ou un 254}
   // pour récup tu fais :
   // $monResultat = $monArray['laClef];    et $monresultat prend la valeur
   // donc pour nous BG =Bourgogne Franche-Comté
   // $laHauteurDeLaDivBG = $graphInfos['janvier2017]['nbCompaniesByRegion']['Bourgogne Franche-Comté'];
   // et maintennat $laHauteurDeLaDivBG est égal à ce texte : "215"

   // on va avoir besoin d'afficher le nom de la région et le nombre associé :
   // on colle la partie de l'array qui nous interresse dans une variable pour pas tous réécrire à chaque fois
   var garph1values = graphInfos['janvier2017']['nbCompaniesByRegion'];
   // dans la boucle ci-dessous chaque région va être passée en revue
   // du coup si tu y fait des créations de div, tu en auras autant que de régions ;)
   // ici key représente [$region]
   for (var region in garph1values) {
       if (dbvalues.hasOwnProperty(region)) {
           //le nom de la région à afficher :
           var regionName = region; 
           var hauteur = garph1values[region];
           // ensuite il suffit d'avoir fait des enfant de la divgraph
           // et de se servir des 2 variables ci-dessus
           console.log( regionName + hauteur);
       }
   }




    // Schéma de $graphInfos : les données reçues par la page
    // $graphInfos[$dbTableName]['nbCompaniesByHandicap'][$handicap] = string 'leNombreDEntreprises';
    // $graphInfos[$dbTableName]['nbCompaniesByRegion'][$region] = string 'leNombreDEntreprises';
    // $graphInfos[$dbTableName]['nbCompaniesByRegionByHandicap'][$region][$handicap] = string 'leNombreDEntreprises';

