/* Les options pour afficher la France */
const mapOptions = {
    center: [49.1193089, 6.1757156],
    zoom: 12
}

/* Les options pour affiner la localisation */
const locationOptions = {
    maximumAge: 10000,
    timeout: 5000,
    enableHighAccuracy: true
};

/* Création de la carte */
var map = new L.map("map", mapOptions);

// ajouter un point sur la map

navigator.geolocation.getCurrentPosition(handleLocation, handleLocationError, locationOptions);



/* Création de la couche OpenStreetMap */
var layer = new L.TileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
    { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' });

/* Ajoute la couche de la carte */
map.addLayer(layer);



/* Verifie que le navigateur est compatible avec la géolocalisation */
if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(handleLocation, handleLocationError, locationOptions);
} else {
    /* Le navigateur n'est pas compatible */
alert("Géolocalisation indisponible");
 }

 function handleLocation(position) {
     /* Zoom avant de trouver la localisation */
map.setZoom(14);
/* Centre la carte sur la latitude et la longitude de la localisation de l'utilisateur */
 map.panTo(new L.LatLng(position.coords.latitude, position.coords.longitude));
     var marker = L.marker([position.coords.latitude,  position.coords.longitude], {title: "Ma position"}).addTo(map);

}

function handleLocationError(msg) {
 alert("Erreur lors de la géolocalisation");
}





