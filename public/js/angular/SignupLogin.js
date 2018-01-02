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

    addEventListeners()
});

app.controller('Logout', function($scope, $http) {
    console.log("logout() called:");

    $scope.$emit('logout', true);
    $scope.$emit('ShowOldHeader', true);
});

function addEventListeners() {

    var images = {
        "name": {"focus": "full-name", "blur": "full-name-white"},
        "input-password": {"focus": "password", "blur": "password-white"},
        "input-phone": {"focus": "phone", "blur": "phone-white"},
        "input-email": {"focus": "email", "blur": "email-white"},
        "email": {"focus": "email", "blur": "email-white"},
        "inputGroupSuccess2": {"focus": "email", "blur": "email-white"},
        "password": {"focus": "password", "blur": "password-white"}
    };

    $("#input-email, #input-password, #input-phone, #name, #email, #password, input#inputGroupSuccess2").on('focus blur', function (event) {
        var imageName = "img/" + images[event.target.id][event.type] + ".png";
        var css = {"background": "url(" +imageName + ") no-repeat center center"};
        $(this).parent().children('span').css(css);

        if (event.type === 'focus') {
            $(this).parent().css({"box-shadow": "-2px 3px 4px 2px rgba(0, 0, 0, 0.05)"});
            if (event.target.id === "password" || event.target.id === "input-password") {
                $(this).parent().children('span').css({"background-color": "white"});
                $(this).css({"background-color": "white"});
            }
        } else {
            $(this).parent().css({"box-shadow": "none"});
            if (event.target.id === "password" || event.target.id === "input-password") {
                $(this).parent().children('span').css({"background-color": "rgba(239, 241, 247, 0.45)"});
                $(this).css({"background-color": "rgba(239, 241, 247, 0.45)"});
            }
        }
    });
}

var testing = false;