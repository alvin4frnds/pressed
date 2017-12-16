/**
 * Created by praveen on 15/12/17.
 */

var app = angular.module("app", ["ngRoute", "satellizer"]);
app.config(function($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl : "html/main.htm",
            controller: 'Main'
        })
        .when("/login", {
            templateUrl : "html/login.htm",
            controller: 'SignupLogin'
        })
        .when('/create-account', {
            templateUrl: 'html/create-account.htm',
            controller: 'SignupLogin'
        })
        .when('/location', {
            templateUrl: 'html/create-account.htm'
        })
        .when("/pricing", {
            templateUrl : "html/care.htm"
        })
        .when("/process", {
            templateUrl : "html/checkout.htm"
        })
        .when("/about", {
            templateUrl : "html/landing1.htm"
        })
        .when("/request-demo", {
            templateUrl : "html/login.htm"
        });
});
app.config(function($authProvider) {
    $authProvider.facebook({
        clientId: '871629239710896',
        responseType: 'token',
        redirectUri: window.location.origin + '/index.html'
    });
    $authProvider.google({
        clientId: '152654844989-060rj3nmkr7udbmvmef39mg3prm6brg3.apps.googleusercontent.com',
        responseType: 'token',
        redirectUri: window.location.origin + '/index.html'
    });
});

app.controller('LayoutController', function($scope, $auth) {
    $scope.config = {
        oldHeader: true
    };

    // listen for the event in the relevant $scope
    $scope.$on('ShowOldHeader', function (event, data) {
        console.log("Received event 'ShowHideHeader' with ", data);
        $scope.config.oldHeader = !!data;

        // show/hide the Oldheader. using this
        // $scope.$emit('ShowOldHeader', false);
    });

    $scope.authenticate = function(method) {
        $auth.authenticate(method)
            .then(function(response) {
                console.log("Success while authenticating. ", response);
                $scope.$broadcast("FoundToken", {
                    token: $auth.getToken(),
                    method: method
                });
            }).catch(function(error) {
            console.log("Error while authenticating. ", error)
        });
    }
});

app.controller('Main', function($scope) {
    // console.log($scope.oldHeader);
});

