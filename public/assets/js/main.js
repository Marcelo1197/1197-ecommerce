// Initialize and add the map
function initMap() {
  // La ubicacion del local en Corrientes
  
  const localUbicacion = { lat: -27.46907467661675, lng: -58.82088701987232 };
  // Hago que el mapa se centre en la dirección del local y además agrego un zoom x4
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: localUbicacion,
  });
  // Agrego un marcador al mapa, exactamente en la dirección del local
  const marker = new google.maps.Marker({
    position: localUbicacion,
    map: map,
  });
}

window.initMap = initMap;