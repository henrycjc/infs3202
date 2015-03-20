function initialize() {
    var res1 = new google.maps.LatLng(-27.505633, 152.960994); //royal thai
    var res2 = new google.maps.LatLng(-27.501785, 152.974403); //laksa hut
    var res3 = new google.maps.LatLng(-27.492614, 152.979461); // dos amigos
    var res4 = new google.maps.LatLng(-27.501400, 152.972454); // Harajuku Gyoza

    var mapOptions = {
        center: { lat: -27.500580, lng: 152.971195}, //-27.500580, 152.971195
        zoom: 15
    };
    var marker1 = new google.maps.Marker({
        position: res1,
        icon: "../img/pracs/maps/MarkerA.png",
        title:"Royal Sri Thai"
    });
    var marker2 = new google.maps.Marker({
        position: res2,
        icon: "../img/pracs/maps/MarkerB.png",
        title:"Laksa Hut"
    });
    var marker3 = new google.maps.Marker({
        position: res3,
        icon: "../img/pracs/maps/MarkerC.png",
        title:"Dos Amigos"
    });
    var marker4 = new google.maps.Marker({
        position: res4,
        icon: "../img/pracs/maps/MarkerD.png",
        title:"Harajuku Gyoza"
    });

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    marker1.setMap(map);
    marker2.setMap(map);
    marker3.setMap(map);
    marker4.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
