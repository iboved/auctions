window.initMap = function() {
    var map_lat = parseFloat($('#map_lat').val());
    var map_lng = parseFloat($('#map_lng').val());
    var marker_title = $('#marker_title').val();

    var myLatLng = {lat: map_lat, lng: map_lng};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: myLatLng,
        gestureHandling: 'cooperative'
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: marker_title
    });
};
