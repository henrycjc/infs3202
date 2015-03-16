function initialize() {
    var res1 = new google.maps.LatLng(-27.505704, 152.959);
    var res2 = new google.maps.LatLng(-27.505704, 152.960);
    var res3 = new google.maps.LatLng(-27.505704, 152.961);
    var res4 = new google.maps.LatLng(-27.505704, 152.962);

    var mapOptions = {
        center: { lat: -27.500225, lng: 152.975773},
        zoom: 14
    };
    var marker1 = new google.maps.Marker({
        position: res1,
        title:""
    });
    var marker2 = new google.maps.Marker({
        position: res2,
        title:"Royal Thai"
    });
    var marker3 = new google.maps.Marker({
        position: res3,
        title:"Royal Thai"
    });
    var marker4 = new google.maps.Marker({
        position: res4,
        title:"Royal Thai"
    });


    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    marker1.setMap(map);
    marker2.setMap(map);
    marker3.setMap(map);
    marker4.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);