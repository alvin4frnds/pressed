/**
 * Created by praveen on 03/01/18.
 */
app.controller('NoFooter', function($scope) {
    $scope.$emit('ShowOldHeader', false);
    $scope.$emit("showHeaderFooter", true);

    jQuery("footer").hide();
});
app.controller('NoHeaderFooter', function($scope) {
    $scope.$emit('ShowOldHeader', false);
    $scope.$emit("showHeaderFooter", false);
});