<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="facebook-app-client-id" content="871629239710896">
    <meta name="google-signin-client_id" content="152654844989-060rj3nmkr7udbmvmef39mg3prm6brg3.apps.googleusercontent.com">
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">

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
                    <li><a href="#!login" class="sign-on-links" style="color: black; font-family: Graphik-regular,serif;">Login</a></li>
                    <li style="margin-top: 5px;"><a href="#!request-demo" class="sign-on-links request-demo-button" style="padding: 8px; margin: 5px; color: black; font-family: Graphik-regular,serif;">Request a Demo</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
            <!-- Start header -->

            <!-- End header -->
        </div><!-- /.container-fluid -->
    </nav>
    <nav ng-show="!config.oldHeader && config.showHeaderFooter" class="navbar navbar-default" style="margin-top: 0; margin-bottom: 0; background-color: white;box-shadow: 0px 2px 10px 0 lightgrey;">

        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="padding-top: 10px;">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img class="img-responsive" src="images/logo.png" alt="logo" style="max-width: 150px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background-color: white;">

                <div class="col-md-2 col-md-offset-3">
                    <ul class="nav navbar-nav navbar-center">

                        <li>
                            <a class="room-item bold-font" href="#" style="margin-top: 5px; color: black;">
                                <img src="images/ca.png" alt="">&nbsp;&nbsp; laundry room</a>
                        </li>

                    </ul>
                </div>

                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown profile" style="border: 0">
                        <a class="dropdown-toggle bold-font" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"
                           style="position: relative; background-color: #f9f9f9; padding-top: 10px; padding-bottom: 10px;">hi @{{ config.firstName || "there" }}
                            !&nbsp;&nbsp;&nbsp;
                                <img ng-src='@{{ config.profileImage || "images/Man.png" }}' alt=""
                                        style="width: 40px; height: 40px; border-radius: 20px;">
                                <span class="badge">1</span>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa fa-ellipsis-v" aria-hidden="true" style="font-size: 30px; color: #D8D8D8; vertical-align: middle;"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="drop-down-anchor" href="#"><img class="drop-down-anchor" src="images/dropdown-profile.png" alt="icon"> my profile</a></li>
                            <li><a class="drop-down-anchor" href="#"><img class="drop-down-anchor" src="images/dropdown-one.png" alt="icon"> upcomeing order(s)</a></li>
                            <li><a class="drop-down-anchor" href="#"><img class="drop-down-anchor" src="images/dropdown-history.png" alt="icon"> order history</a></li>
                            <li><a class="drop-down-anchor" href="#"><img class="drop-down-anchor" src="images/dropdown-payment.png" alt="icon"> payment</a></li>
                            <li><a class="drop-down-anchor" href="#"><img class="drop-down-anchor" src="images/dropdown-instructions.png" alt="icon"> instructions & care</a></li>
                            <li><a class="drop-down-anchor" href="#"><img class="drop-down-anchor" src="images/dropdown-notification.png" alt="icon"> notifications</a></li>
                            <li><a class="drop-down-anchor" href="#"><img class="drop-down-anchor" src="images/dropdown-help.png" alt="icon"> help</a></li>
                            <li><a class="drop-down-anchor" href="#!/logout"><img class="drop-down-anchor" src="images/dropdown-out.png" alt="icon"> Sign-out</a>
                            </li>
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
    <script src="js/angular/NoHeaderFooter.js"></script>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDnT6ewhJpccffkJRlbAPyCQeQKJxJfLQ8&libraries=places'></script>

    <!-- footer-area -->
    <footer class="footer-area" ng-show="config.oldHeader && config.showHeaderFooter">
        <div class="container-fluid">
            <div class="col-md-10 col-md-offset-1">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="footer-top">
                            <div class="footer-img">
                                <img class="img-responsive" src="images/li-logo.png" alt="img">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-3">
                        <div class="about-text">
                            <p class="footer-link"><a class="footer-link" href="#about-us">About Us</a></p>
                            <p class="footer-link"><a class="footer-link" href="#about-us">Gifting</a></p>
                            <p class="footer-link"><a class="footer-link" href="#about-us">Become A Valet</a></p>
                            <p class="footer-link"><a class="footer-link" href="#about-us">Become A Vendor</a></p>
                            <p class="footer-link"><a class="footer-link" href="#about-us">Partnership</a></p>
                            <p class="footer-link"><a class="footer-link" href="#about-us">Download The App</a></p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="usefull-link">
                            <p class="footer-link">
                                <span class="footer-link">
                                    Legal
                                </span>
                            </p>
                            <div class="about-text">
                                <p class="footer-link"><a class="footer-link" href="#about-us">Privacy</a></p>
                                <p class="footer-link"><a class="footer-link" href="#about-us">Disclosure</a></p>
                                <p class="footer-link"><a class="footer-link" href="#about-us">Terms Of Service</a></p>
                            </div>
                        </div>

                        <div class="social-link">
                            <ul>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4 col-sm-offset-2">
                        <div class="subcribe">
                            <p class="footer-link">
                                <span class="footer-link">
                                    Keep in touch
                                </span>
                            </p>
                            <p class="footer-link">Stay updated on our new service areas, promos, and more</p>
                            <p><a class="btn btn-primary subscribe-button" href="#" role="button">SUBSCRIBE</a></p>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1">
                        <hr style="border-top: solid 1px #DBD7D7; opacity: 0.53">
                    </div>

                    <div class="col-sm-12">
                        <div class="footer-bottom">
                            <div class="col-sm-6">
                                <p>All Rights Reserved Terms of Use and Privacy Policy</p>
                            </div>
                            <div class="col-sm-6" style="padding-right: 0">
                                <p class="pull-right">
                                    <a href="#location" class="footer-link">Locations</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{--<a href="#location" class="footer-link">(current)</a>--}}
                                    {{--&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;--}}
                                    <a href="#location" class="footer-link">Pricing</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#location" class="footer-link">Our Process</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#location" class="footer-link">About</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <footer class="light-green-strip" ng-show="!config.oldHeader && config.showHeaderFooter"></footer>

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
