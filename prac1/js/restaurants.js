function initialize1() {
    var res1 = new google.maps.LatLng(-27.505633, 152.960994); //royal thai
    var mapOptions = {
        center: res1, //-27.500580, 152.971195
        zoom: 18
    };
    var marker1 = new google.maps.Marker({
        position: res1,
        icon: "../img/maps/MarkerA.png",
        title:"Royal Sri Thai"
    });
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    marker1.setMap(map);
}

function initialize2() {
 
    var res2 = new google.maps.LatLng(-27.501785, 152.974403); //laksa hut
    var mapOptions = {
        center: res2, //-27.500580, 152.971195
        zoom: 18
    };
    var marker2 = new google.maps.Marker({
        position: res2,
        icon: "../img/maps/MarkerB.png",
        title:"Laksa Hut"
    });
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    marker2.setMap(map);
}

function initialize3() {

    var res3 = new google.maps.LatLng(-27.492614, 152.979461); // dos amigos
    var mapOptions = {
        center: res3, //-27.500580, 152.971195
        zoom: 18
    };
    var marker3 = new google.maps.Marker({
        position: res3,
        icon: "../img/maps/MarkerC.png",
        title:"Dos Amigos"
    });
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    marker3.setMap(map);
}



function initialize4() {

    var res4 = new google.maps.LatLng(-27.501400, 152.972454); // Harajuku Gyoza
    var mapOptions = {
        center: res4, //-27.500580, 152.971195
        zoom: 18
    };
    var marker4 = new google.maps.Marker({
        position: res4,
        icon: "../img/maps/MarkerD.png",
        title:"Harajuku Gyoza"
    });
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    marker4.setMap(map);
}

function addMap(name) {

    switch (name) {
        case "Thai":
            google.maps.event.addDomListener(window, 'load', initialize1);
            break;
        case "Laksa":
            google.maps.event.addDomListener(window, 'load', initialize2);
            break;
        case "Amigos":
            google.maps.event.addDomListener(window, 'load', initialize3);
            break;
        case "Harajuku":
            google.maps.event.addDomListener(window, 'load', initialize4);
            break;
        default:
            console.log("Shits fucked yo...");
    }
}
//google.maps.event.addDomListener(window, 'load', initialize);
