<?php
include 'header_files.php';
include 'connection.php';
session_start();
if (!isset($_SESSION["email"])) {
    header("location:login.php");
} else {
    $email = $_SESSION['email'];
}
?>
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
                                <li><a href="adminhome.php" class="active" data-hover="Home">Home</a></li>
                                <li><a href="managenews.php" data-hover="News">News</a></li>
                                <li><a href="manageadmin.php" data-hover="Adminis">Adminis</a></li>

                                <li><a href="broadcast.php" data-hover="Broadcast SMS">Broadcast SMS</a></li>
                                <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"
                                                        href="">Cities/Countries <span
                                                class="caret"></span>
                                        <ul class="dropdown-menu">
                                            <li><a href="city.php">Manage City</a></li>
                                            <li><a href="countries.php">Countries</a></li>
                                        </ul>
                                    </a>
                                </li>
                                <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"
                                                        href="">Photos <span
                                                class="caret"></span>
                                        <ul class="dropdown-menu">
                                            <li><a href="photo-video.php">Upload Photo/Video</a></li>
                                            <li><a href="view-photo-video.php">View Photo/Video</a></li>
                                        </ul>
                                    </a>
                                </li>
                                <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"
                                                        href=""><span class="glyphicon glyphicon-wrench"></span> <span
                                                class="caret"></span>
                                        <ul class="dropdown-menu">
                                            <li><a href="changepassword.php">Change Password</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </a>
                                </li>
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
