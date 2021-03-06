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
        .when("/pricing-big", {
            templateUrl : "html/pricing.htm",
            controller: 'Main'
        })
        .when("/logout", {
            templateUrl : "html/login.htm",
            controller: 'Logout'
        })
        .when('/forgot-password', {
            templateUrl: "html/password-recover.htm",
            controller: "SignupLogin"
        })
        .when('/request-demo', {
            templateUrl: "html/request-demo.htm",
            controller: "SignupLogin"
        })
        .when('/create-account', {
            templateUrl: 'html/create-account.htm',
            controller: 'SignupLogin'
        })
        .when("/home", {
            templateUrl : "html/landing1.htm",
            controller: 'HomeController'
        })
        .when('/wash-&-fold', {
            templateUrl: "html/landing2.htm",
            controller: 'HomeController'
        })
        .when('/dry-clean', {
            templateUrl: "html/landing2.htm",
            controller: 'HomeController'
        })
        .when('/payments', {
            templateUrl: "html/payments.htm",
            controller: 'NoFooter'
        })
        .when('/save-card', {
            templateUrl: "html/save-card.htm",
            controller: 'NoHeaderFooter'
        })
        .when('/order-status', {
            templateUrl: "html/order-status.htm",
            controller: 'NoHeaderFooter'
        })
        .when('/order-history', {
            templateUrl: "html/order-history.htm",
            controller: 'NoFooter'
        })
        .when('/order-receipt', {
            templateUrl: "html/order-receipt.htm",
            controller: 'NoHeaderFooter'
        })
        .when('/location', {
            templateUrl: 'html/create-account.htm'
        })
        .when("/pricing", {
            templateUrl : "html/care.htm",
            controller: 'NoHeaderFooter'
        })
        .when("/price", {
            templateUrl : "html/price.htm",
            controller: 'NoHeaderFooter'
        })
        .when("/process", {
            templateUrl : "html/checkout.htm",
            controller: 'NoHeaderFooter'
        })
        .when("/about", {
            templateUrl : "html/landing1.htm",
            controller: 'NoHeaderFooter'
        });
});
app.config(function($authProvider) {
    $authProvider.facebook({
        clientId: getMetaValue('facebook-app-client-id'),
        responseType: 'token'
    });
    $authProvider.google({
        clientId: getMetaValue('google-signin-client_id'),
        responseType: 'token'
    });
});

app.controller('LayoutController', function($scope, $auth) {
    $scope.config = {
        oldHeader: true,
        isLoading: false,
        firstName: null,
        profileImage: null,
        showHeaderFooter: true
    };

    $scope.$on('IsLoading', function(event, data) {
        console.log("Received event 'IsLoading with ", data);
        $scope.config.isLoading = !!data;
    });

    // listen for the event in the relevant $scope
    $scope.$on('ShowOldHeader', function (event, data) {
        console.log("Received event 'ShowHideHeader' with ", data);
        $scope.config.oldHeader = !!data;

        // show/hide the Oldheader. using this
        // $scope.$emit('ShowOldHeader', false);
    });

    $scope.$on("showHeaderFooter", function(event, data) {
        console.log("Received event 'showHeaderFooter' with ", data);
        $scope.config.showHeaderFooter = !!data;
    });

    $scope.authenticate = function(method) {
        $auth.authenticate(method)
            .then(function(response) {
                console.log("Success while authenticating. ", response);
                globalVars.oauthResp = response;
                $scope.$broadcast("FoundToken", {
                    token: $auth.getToken(),
                    method: method
                });
            }).catch(function(error) {
            console.log("Error while authenticating. ", error)
        });
    };

    $scope.boot = function() {
        console.log("booting the application.");
        console.log(globalVars);
        if (globalVars.user.id) {
            $scope.config.oldHeader = true;
            // window.location = "https://" + window.location.hostname + "/#!/home";

            setUserDetails(globalVars.user)
        }

    };

    $scope.$on('SetUser', function(event, data) { setUserDetails(data) });

    function setUserDetails(userObj) {
        $scope.config.firstName = userObj.name.split(" ")[0] || "there";
        $scope.config.profileImage = userObj.image || null;
    }

    $scope.$on('logout', function(event, data) {
        $scope.config.firstName = "there";
        $scope.config.profileImage = null;

        globalVars.user = {};
        Cookies.set('user', globalVars.user);
        window.location = "https://" + window.location.hostname + "/#!/";
    });
});

app.controller('Main', function($scope) {
    // console.log($scope.oldHeader);
    // 
    $scope.$emit('showHeaderFooter', true);
    $scope.$emit("ShowOldHeader", true);
});

function redirectTo(where) {
    where = where || 'home';
    window.location = "https://" + window.location.hostname + "/#!/" + where;
}
