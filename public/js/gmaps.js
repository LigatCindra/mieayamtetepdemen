let map;

async function initMap(){
    const position = { lat: -6.191121578216553, lng: 106.6144790649414 };
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");


    map = new Map(document.getElementById("map"), {
        zoom: 16,
        center: position,
      });

    const marker = new AdvancedMarkerElement({
        map: map,
        position: position,
        title: "Mie Ayam Tetep Demen"
    })
}

initMap();