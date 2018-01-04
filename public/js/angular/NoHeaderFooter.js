/**
 * Created by praveen on 03/01/18.
 */
app.controller('NoFooter', function($scope) {
    $scope.$emit('ShowOldHeader', false);
    $scope.$emit("showHeaderFooter", true);

    jQuery("footer").hide();
});
function setupGoogleMap() {

    if (! $("#googleMap").length) return;

    var myCenter=new google.maps.LatLng(23.752390,90.374173);


    function initialize()
    {
        var mapProp = {
            center:myCenter,
            zoom:18,
            styles: [{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#2F2F2F"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#575457"}]},{"featureType":"road","elementType":"all","stylers":[{"color":"#c2c2c2"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#DA2026"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#ffffff"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#DA2026"}]}],
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

        var marker=new google.maps.Marker({
            position:myCenter,
            animation:google.maps.Animation.BOUNCE
        });

        marker.setMap(map);

        var infowindow = new google.maps.InfoWindow({
            content:"<b>RAMS ITECH</b> <br/>Road#13, House#8-A/10, 1st Floor, Apt#1A,<br>Dhanmondi, Dhaka-1215, Bangladesh"
        });

        infowindow.open(map,marker);
    }

    google.maps.event.addDomListener(window, 'load', initialize);

}
app.controller('NoHeaderFooter', function($scope) {
    $scope.$emit('ShowOldHeader', false);
    $scope.$emit("showHeaderFooter", false);

    setupGoogleMap()
});

