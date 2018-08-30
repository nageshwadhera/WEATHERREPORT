<?php
include 'header_files.php';
include 'connection.php';
session_start();
if (isset($_SESSION['useremail'])) {
    $email = $_SESSION['useremail'];
    $user = "select * from user_cities WHERE user_username='$email' group by countryid";
    $user_result = mysqli_query($conn, $user);
    $user_row = mysqli_fetch_array($user_result);
} else {
    header("Location:userlogin.php");
}
?>
<!--Header-->
<div class="header" id="home">
    <!--Top-Bar-->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="header-nav">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a class="navbar-brand" href="index.php">Climate Chronicle<sup><i class="fa fa-plane"
                                                                                              aria-hidden="true"></i><sup></a>
                        </h1>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <nav class="cl-effect-15" id="cl-effect-15">
                            <ul>
                                <li><a href="userhome.php" class="active" data-hover="Home">Home</a></li>
                                <li><a href="scheduling.php" data-hover="Scheduling">Scheduling</a></li>
                                <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"
                                                        href="">Weather Services <span
                                                class="caret"></span>
                                        <ul class="dropdown-menu">
                                            <li><a href="forecast.php">Weather Forecast</a></li>
                                            <li><a href="compare_weather.php">Compare Weather</a></li>
                                            <li><a href="weather_history.php">Historical Weather</a></li>
                                        </ul>
                                    </a></li>


                                <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"
                                                    href=""   >Settings <span
                                                class="caret"></span>
                                        <ul class="dropdown-menu">
                                            <li><a href="change_city.php" >Change city</a></li>
                                            <li><a href="userchangepassword.php" >Change Password</a></li>
                                            <li><a href="userlogout.php" >Log out</a></li>
                                        </ul>
                                    </a></li>
                            </ul>
                        </nav>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!--//Top-Bar-->
    <!--Slider-->
    <hr>
</div>
