/**
 * Created by praveen on 16/12/17.
 */
app.controller('SignupLogin', function($scope) {
    $scope.$on('FoundToken', function(event, authObj) {
        console.log("Found this token, processing. ", authObj);
    })
});