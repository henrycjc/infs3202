var infowindow = new google.maps.InfoWindow();
var map;

function initialize() {
    var mapOptions = {
        zoom: 15
    };
    geocoder = new google.maps.Geocoder();
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    // Try HTML5 geolocation
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            console.log(position.coords.latitude);
            var infowindow = new google.maps.InfoWindow({
                map: map,
                position: pos,
                content: 'Your Location'
            });
            geocoder.geocode({'latLng': pos}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                  if (results[1]) {
                    console.log(results[1]);
                    //results[1].address_components[1]['short_name']);
                      var request = {
                        location: pos,
                        radius: 500,
                        types: ['food']
                      };
                      var service = new google.maps.places.PlacesService(map);
                      service.nearbySearch(request, callback);
                  } else {
                    alert('No results found');
                  }
                } else {
                  alert('Geocoder failed due to: ' + status);
                }
              });
            map.setCenter(pos);
            }, function() {
                handleNoGeolocation(true);
        });
    } else {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
    }
}

function handleNoGeolocation(errorFlag) {

    if (errorFlag) {
        var content = 'Error: The Geolocation service failed.';
    } else {
        var content = 'Error: Your browser doesn\'t support geolocation.';
    }

    var options = {
        map: map,
        position: new google.maps.LatLng(60, 105),
        content: content
    };

    var infowindow = new google.maps.InfoWindow(options);
    map.setCenter(options.position);
}

function callback(results, status) {
    //console.log(JSON.stringify(results));
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        $.ajax("places.php", {
            data: {'places':JSON.stringify(results)},
            method: "post"
            //dataType: "json"
        }).done(function(data) {
            console.log(data);
        });
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
        }
    }
}

function createMarker(place) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
    });
}

google.maps.event.addDomListener(window, 'load', initialize);
