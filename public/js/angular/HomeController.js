/**
 * Created by praveen on 16/12/17.
 */
app.controller('HomeController', function($scope) {
    $scope.$emit('ShowOldHeader', false);

    $scope.goToLanding2 = function(page) {
        console.log("goToLanding called with: ", page);
        globalVars.mainImage = page;
        window.location = "/#!/" + page;
    };

    $scope.getTheImage = function() {
        console.log("gettheimage() called: ");

        $scope.mainImage = (globalVars.mainImage === "wash-&-fold") ? "images/food.png" : "images/dry-clean.png";
    }
});