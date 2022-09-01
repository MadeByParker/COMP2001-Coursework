<?php

include_once 'header.php';
require("./DataAccess.php");
$file = "../assets/data/busStopLocations.geojson";

?>

<head>
    <meta charset="UTF-8">
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
</head>
<main>
    <div class="container-fluid">
        <div id="context">
        <h2>Plymouth Bus Stop Locations Table</h2>
        <span>This data is displayed from the geoJSON data set provided from DATA Place Plymouth - <a target="_blank" href="https://plymouth.thedata.place/dataset/bus-stops" id="dataset-link"> Dataset. </a></span>
        </div>
        <div class="row">
            <div class="col-6">
                <table class="table-striped">
                    <thead>
                    <tr style="width: 200px;">
                        <th style="width: 200px;">Area</th>
                        <th style="width: 200px;">Street Name</th>
                        <th style="width: 200px;">Location</th>
                        <th style="width: 200px;">Stop Type</th>
                        <th style="width: 200px;">Coordinates</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!--Display Table-->
                    <?php echo DataAccess::displayTable($file); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="bottom"></div>

        <a href="#" class="to-top">
            <i class="fas fa-chevron-up"></i>
        </a>
        <a href="#bottom" class="to-bottom">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>

    <script>
        const toTop = document.querySelector(".to-top");

        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 100) {
                toTop.classList.add("active");
            } else {
                toTop.classList.remove("active");
            }
        })

        const toBottom = document.querySelector(".to-bottom");

        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 100) {
                toBottom.classList.add("active");
            } else {
                toBottom.classList.remove("active");
            }
        })

    </script>
</main>

<?php include_once 'footer.php'; ?>