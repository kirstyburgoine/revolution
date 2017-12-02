//map code, from Neil Kinnish (@neiltak - follow this guy)
var directionsDisplay;
var directionsService;

var styles = [
    {
      stylers: [
        { hue: "#ff4d00" },
        { saturation: -64 },
        { weight: 0.5 },
        { gamma: 1 },
        { visibility: "on" }
      ]
    }
];

$(document).ready(function() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initMap';
    document.body.appendChild(script);
});

function initMap(){

    setTimeout(function() {
        $(".conference-centre-info").addClass("visible");
    }, 750);

    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer();

    var mapOptions = {
        zoom: 14,
        center: new google.maps.LatLng(52.71706,-2.79396),
        panControl: false,
        zoomControl: false,
        scaleControl: false,
        mapTypeControl: false,
        scrollwheel: false,
        draggable: false,
        disableDefaultUI: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
        },
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
    var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});

    var myIcon = new google.maps.MarkerImage('/assets/img/marker.png', null, null, null, new google.maps.Size(29,29));

    var myLatLng = new google.maps.LatLng(52.709357,-2.793752);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: myIcon
    });

    map.mapTypes.set('map_style', styledMap);
    map.setMapTypeId('map_style');

    var myLatLngCntr = new google.maps.LatLng(52.71706,-2.79396);
    google.maps.event.addDomListener(window, 'resize', function() {
        map.setCenter(myLatLngCntr);
    });
}
