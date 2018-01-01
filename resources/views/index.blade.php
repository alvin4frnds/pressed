<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="facebook-app-client-id" content="871629239710896">
    <meta name="google-signin-client_id" content="152654844989-060rj3nmkr7udbmvmef39mg3prm6brg3.apps.googleusercontent.com">
    <title>{{ env("APP_NAME", "Pressed") }}</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="all"/>

    <script src="js/angular.min.js"></script>
    <script src="js/angular-route.js"></script>
    <script src="dist/satellizer.min.js"></script>
    <script src="dist/sdk.js"></script>

</head>
<body>

<script>
    var globalVars = {!! json_encode($data) !!};
</script>

<!--- start main-wrapper -->
<div class="main-wrapper" ng-app="app" id="layout-app" ng-controller="LayoutController" ng-init="boot()" ng-class='{"is-loading": config.isLoading}'>

    <nav ng-show="config.oldHeader && config.showHeaderFooter" class="navbar navbar-default greyish-font-color" id="old-header">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img class="img-responsive" src="images/logo.png" alt="logo"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style="margin-left: 40px;">
                    <li class="active"><a href="#!location">Locations <span class="sr-only">(current)</span></a></li>
                    <li><a href="#!pricing">Pricing</a></li>
                    <li><a href="#!process">Our Process</a></li>
                    <li><a href="#!about">About</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#!login" class="sign-on-links" style="">Login</a></li>
                    <li><a href="#!request-demo" class="sign-on-links request-demo-button" style="padding: 8px; margin: 5px;">Request a Demo</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
            <!-- Start header -->

            <!-- End header -->
        </div><!-- /.container-fluid -->
    </nav>
    <nav ng-hide="config.oldHeader" ng-show='config.showHeaderFooter' class="navbar navbar-default" style="margin-top: 0; background-color: white;box-shadow: 0px 2px 10px 0 lightgrey;">

        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="padding-top: 10px;">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img class="img-responsive" src="images/logo.png" alt="logo"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background-color: white;">

                <div class="col-md-2 col-md-offset-3">
                    <ul class="nav navbar-nav navbar-center">

                        <a class="room-item" href="#"><img src="images/ca.png" alt=""> laundry room</a>

                    </ul>
                </div>

                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown profile" style="border: 0">
                        <a class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="background-color: #f9f9f9; padding-top: 10px; padding-bottom: 10px;">hi @{{ config.firstName || "there" }}! <img ng-src='@{{ config.profileImage || "images/Man.png" }}' alt="" style="width: 32px; height: 32px;"> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><img src="images/i5.png" alt="icon"> my profile</a></li>
                            <li><a href="#"><span>1</span>  upcomeing order(s)</a></li>
                            <li><a href="#"><img src="images/i1.png" alt="icon">  order history</a></li>
                            <li><a href="#"><img src="images/i2.png" alt="icon">  payment</a></li>
                            <li><a href="#"><img src="images/i3.png" alt="icon">  instructions & care</a></li>
                            <li><a href="#"><img src="images/i4.png" alt="icon">  notifications</a></li>
                            <li><a href="#"><i class="fa fa-question-circle-o" aria-hidden="true"></i>  help</a></li>
                            <li><a href="#!/logout"><i class="fa fa fa-sign-out" aria-hidden="true"></i>  Sign-out</a></li>
                        </ul>
            </div><!-- /.navbar-collapse -->
            <!-- Start header -->

            <!-- End header -->
        </div><!-- /.container-fluid -->
    </nav>

    <div ng-view></div>

    <script src="js/angular/index.js"></script>
    <script src="js/angular/SignupLogin.js"></script>
    <script src="js/angular/HomeController.js"></script>

    <!-- footer-area -->
    <footer class="footer-area" ng-show="config.showHeaderFooter">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="footer-top">
                            <div class="footer-img">
                                <img class="img-responsive" src="images/li-logo.png" alt="img">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="about-text">
                            <h3>about us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat</p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="usefull-link">
                            <h5>Legal</h5>
                            <ul>
                                <li><a href="#">Location</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Process</a></li>
                                <li><a href="#">About</a></li>
                            </ul>
                        </div>

                        <div class="social-link">
                            <ul>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-3 col-sm-offset-3">
                        <div class="subcribe">
                            <h4>Lorem ipsum dolor sit amet</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidun</p>
                            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="footer-bottom">
                            <div class="col-sm-6">
                                <p>AxiomThemes © 2017. All Rights Reserved Terms of Use and Privacy Policy</p>
                            </div>
                            <div class="col-sm-6">
                                <p>Locations | (current) | Pricing | Our Process | About</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </footer>

    <!-- footer-area -->
</div>
<!--- End Main-wrapper -->

<script src="dist/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="dist/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/js.cookie.js"></script>

<script>
    globalVars.user = JSON.parse(Cookies.get('user') || "{}");
    FB.init({
        appId: getMetaValue('facebook-app-client-id'),
        version: 'v2.11'
    });

    function getMetaValue(key) {
        var metas = document.getElementsByTagName('meta');

        for (var i=0; i < metas.length; i++) {
            if (key === metas[i].getAttribute("name")) {
                return metas[i].getAttribute("content");
            }
        }

        return "";
    }
</script>


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>
