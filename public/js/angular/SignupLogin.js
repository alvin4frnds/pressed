/**
 * Created by praveen on 16/12/17.
 */
app.controller('SignupLogin', function($scope, $http) {
    $scope.$emit("showHeaderFooter", false);

    $scope.$on('FoundToken', function(event, authObj) {
        console.log("Found this token, processing. ", authObj);
        $scope.$emit('IsLoading', true);

        if (authObj.method === "google") handleGoogle(authObj.token);
        if (authObj.method === "facebook") handleFacebook(authObj.token);

    });
    $scope.user = {method: "email"};

    $scope.loginMe = function() {
        $scope.$emit('IsLoading', true);
        console.log("Trying to login.", $scope.user);

        $http.post('/api/v1/login', $scope.user)
            .then(function(response) {
                console.log("user successfully loggedin.", response.data);
                $scope.$emit('IsLoading', false);

                if (response.data.success) {
                    globalVars.user = response.data;
                    Cookies.set('user', globalVars.user);
                    $scope.$emit('SetUser', globalVars.user);
                    window.location = "https://" + window.location.hostname + "/#!/home";
                } else {
                    if (response.data.register) {
                        alert(response.data.message);
                        redirectTo('create-account')
                    }

                    $scope.user.error = response.data.message;
                }
            })
            .catch(function(error) {

            })
    };

    $scope.registerMe = function() {
        $scope.$emit('IsLoading', true);
        console.log("Trying to register. with. ", $scope.user);

        $http.post('/api/v1/signup', $scope.user)
            .then(function(response) {
                console.log("user successfully created.", response.data);
                $scope.$emit('IsLoading', false);

                if (response.data.success) {
                    globalVars.user = response.data;
                    Cookies.set('user', globalVars.user);
                    $scope.$emit('SetUser', globalVars.user);
                    window.location = "https://" + window.location.hostname + "/#!/home";
                } else {
                    if (response.data.login) {
                        redirectTo('login')
                    }

                    alert(response.data.message);
                }
            }).catch(function(error) {

            });

        return false;
    };

    function handleFacebook(token) {
        token = token || globalVars.oauthResp["!#access_token"];
        FB.api('/me', 'get', {access_token: token, fields: "name,id,email,gender"}, function(response) {
            console.log('got the user', response);

            $http.post("/api/v1/signup", {
                "name": response.name,
                "token_id": response.id,
                'email': response.email,
                'gender': response.gender,
                "method": "facebook"
                // "token": token
            }).then(function(response) {
                $scope.$emit('IsLoading', false);
                console.log("user successfully signed up:", response.data);

                if (response.data.success) {
                    globalVars.user = response.data;
                    Cookies.set('user', globalVars.user);
                    $scope.$emit('SetUser', globalVars.user);
                    window.location = "https://" + window.location.hostname + "/#!/home";

                } else {
                    alert(response.data.message);
                }

            }).catch(function(error) {
                console.log("got the error: ", error)
            })
        })
    }

    function handleGoogle(token) {
        $http.get('https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token=' + token)
            .then(function(response) {
                console.log('got the user', response.data);

                $http.post("/api/v1/signup", {
                    "name": response.data.name,
                    "email": response.data.email,
                    "gender": response.data.gender,
                    "token_id": response.data.id,
                    "image": response.data.picture,
                    "method": "google"
                }).then(function(response) {
                    $scope.$emit('IsLoading', false);
                    console.log("user successfully signed up:", response.data);

                    if (response.data.success) {
                        globalVars.user = response.data;
                        Cookies.set('user', globalVars.user);
                        $scope.$emit('SetUser', globalVars.user);
                        window.location = "https://" + window.location.hostname + "/#!/home";

                    } else {
                        alert(response.data.message);
                    }

                }).catch(function(error) {
                    console.log("got the error: ", error)
                })
            })
            .catch(function (error) {
                console.log('got the error', error)
            })
    }
});

app.controller('Logout', function($scope, $http) {
    console.log("logout() called:");

    $scope.$emit('logout', true);
    $scope.$emit('ShowOldHeader', true);
});