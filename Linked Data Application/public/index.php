<?php

include_once 'header.php';

?>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Home</title>
</head>
<main>
<div class="container-fluid">
    <div class="row">
        <div class="col m4">
            <div class="card z-depth-4">
                <div class="card-header">
                    Dataset Links
                </div>
                <div class="card-content-links">
                    <li><a class="link" href="https://plymouth.thedata.place/dataset/bus-stops">Dataset</a></li>
                    <li><a class="link" target="_blank" href="https://plymouth.thedata.place/dataset/bus-stops/resource/1f9be3b0-e578-4f0f-a642-6652dc7fe173">Preview</a></li>
                    <li><a class="link" target="_blank" href="https://plymouth.thedata.place/dataset/fefdb66b-cb4f-48ec-a97d-1f50727cf443/resource/1f9be3b0-e578-4f0f-a642-6652dc7fe173/download/plymouthbusstoplocations.geojson">Download</a> </li>
                </div>
            </div>
        </div>
        <div class="col m4">
            <!--About the LDA-->
            <div class="card z-depth-4">
                <div class="card-header">
                    About the App
                </div>
                <div class="card-content">
                    <span class="description">The linked data application was designed to display a chosen dataset in both  human readable formats, such as in tables and map views, and a computer readable format (RDF format). In this case, the GeoJSON dataset contains the location of bus stops in Plymouth.</span>
                </div>
            </div>
        </div>
        <div class="col m4">
            <div class="card z-depth-4">
                <div class="card-header">
                    View the Data
                </div>
                <!--Data Formats-->
                <div class="card-content-links">
                    <li><a class="link" href="tableView.php">Table View</a></li>
                    <li><a class="link" href="mapView.php">Map View</a></li>
                    <li><a class="link" target="_blank" href="../busstop/">RDF Format</a></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</body>
<?php include_once 'footer.php'; ?>
