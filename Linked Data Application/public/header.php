<?php
date_default_timezone_set('Europe/London');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Harry Parker">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Plymouth Bus Stops</title>
</head>
<style>
    .logoimg {
        margin: 5px 5px;
        display: inline-block;
    }

    #titleName {
        font-size: 28px;
    }

    @media screen and (max-width: 950px) {
        div.nav-wrapper {
            height: 100px;
            margin-bottom: 20px;
            font-size: 20px;
            line-height: 1.5;
        }
    }
</style>
<body>
<!--Header-->
<nav>
    <div class="nav-wrapper blue ">
        <img class="logoimg" alt="plymunilogo" src="../assets/img/logo.png"  width="50" height="50">
        <a class="brand-logo" id="titleName">Bus Stop Locations in Plymouth</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="index.php">Home</a></li>
            <li>|</li>
            <li><a target="_blank" href="../busstop/">JSON-LD RDF Format</a></li>
            <li>|</li>
            <li><a href="tableView.php">Table View</a></li>
            <li>|</li>
            <li><a href="mapView.php">Map View</a></li>
            <li>|</li>
            <li><a href="https://github.com/Plymouth-University/comp2001_assignment-Parker06/tree/main/Linked%20Data%20Application" target="_blank"><i class="fab fa-github fa-2x"></i></a></li>
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="index.php">Home</a></li>
    <li>|</li>
    <li><a target="_blank" href="../busstop/">JSON-LD RDF Format</a></li>
    <li>|</li>
    <li><a href="tableView.php">Table View</a></li>
    <li>|</li>
    <li><a href="mapView.php">Map View</a></li>
    <li>|</li>
    <li><a href="https://github.com/Plymouth-University/comp2001_assignment-Parker06/tree/main/Linked%20Data%20Application" target="_blank"><i class="fab fa-github fa-2x">Github</i></a></li>
</ul>


