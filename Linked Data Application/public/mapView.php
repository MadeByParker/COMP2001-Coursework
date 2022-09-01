<?php

include_once 'header.php';

?>

    <head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
              integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
              crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                crossorigin=""></script>
        <link rel="stylesheet" href="styles.css">
    </head>
    <style>
        @media screen and (max-width: 950px) {
            div#mapid {
                height: 450px;
                width: 450px;
            }
        }

</style>

<main>
    <div class="container-fluid">
        <div id="context">
        <h2>Plymouth Bus Stop Locations Table</h2>
        <span>This data is displayed from the geoJSON data set provided from DATA Place Plymouth -  <a target="_blank" href="https://plymouth.thedata.place/dataset/bus-stops" id="dataset-link"> Dataset. </a></span>
        <br><span class="note">Be aware of the slow loading times of the map</span>
        </div>
        <div class="row">
            <div class="col-6">
                <!--Map View-->
                <div id="mapid"></div>
                <script>
                    var map = L.map('mapid').setView([50.375406, -4.138342], 13);

                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1,
                        accessToken:  'pk.eyJ1Ijoic2hpcmxleWF0a2luc29uIiwiYSI6ImNrZHg2NjhvMjJ5dmsyeHR2YnN3NzZ3ZjMifQ.XX8CY4KiuLA1X_-2HlhZpg'
                    }).addTo(map);

                    url = 'https://plymouth.thedata.place/dataset/fefdb66b-cb4f-48ec-a97d-1f50727cf443/resource/1f9be3b0-e578-4f0f-a642-6652dc7fe173/download/plymouthbusstoplocations.geojson';
                    fetch(url)
                        .then(function (response) {
                            return response.json();
                    })
                        .then(function (data) {
                        L.geoJSON(data, {
                            style: function (feature) {
                                return { color: 'blue'};
                            }
                        }).addTo(map);
                    });
                </script>
            </div>
        </div>
    </div>
    </main>
    </body>
<?php include_once 'footer.php'; ?>