$(function(){

    var latitude  = $('#google-map').data('latitude');
    var longitude = $('#google-map').data('longitude');

    var latlng = ( latitude == '' && longitude == '' ) ? new google.maps.LatLng( 50.833, 4.333 ) : new google.maps.LatLng( latitude, longitude );
    var map = new google.maps.Map( document.getElementById( 'google-map' ), {
        zoom: 8,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        panControl: 0,
        zoomControl: 0,
        mapTypeControl: 0,
        scaleControl: 0,
        streetViewControl: 0,
        overviewMapControl: 0
    });

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        draggable: true,
    }); 
});