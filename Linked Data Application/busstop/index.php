<?php
if($_SERVER["REQUEST_METHOD"] === "GET") {
    //IF THE SERVER is a get method
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    $file = '../assets/data/busStopLocations.geojson';
    $getFile = file_get_contents($file);
    $array1 = str_replace("\"type\":", "\"@type\":", $getFile);
    $array_decoded = json_decode($array1, true);
    //file decoding into php array for JSON-LD RDF Format
    //RDF context
    $context = array(
        '@context' => array(
            'geojson' => 'https://purl.org/geojson/vocab#',
            'Feature' => 'geojson:Feature',
            'FeatureCollection' => 'geojson:FeatureCollection',
            'Point' => 'geojson:Point',
            'coordinates' => array(
                '@container' => '@list',
                '@id' => 'geojson:coordinates',
            ),
            'features' => array(
                '@container' => '@set',
                '@id' => 'geojson:features',
            ),
            'geometry' => 'geojson:geometry',
            'id' => '@id',
            'properties' => 'geojson:properties',
            'type' => '@type',
            'ATCOCODE' => 'https://schema.org/identifier',
            'NAPTANCODE' => 'https://schema.org/Place',
            'COMMONNAME' => 'https://schema.org/Place',
            'STREET' => 'https://schema.org/streetAddress',
            'BEARING' => 'https://schema.org/location',
            'LOCALITY' => 'https://schema.org/location',
            'PARENT' => 'https://schema.org/parent',
            'GRANDPAR' => 'https://schema.org/parent',
            'EASTING' => 'https://schema.org/location',
            'NORTHING' => 'https://schema.org/location',
            'LONGITUDE' => 'https://schema.org/longitude',
            'LATITUTE' => 'https://schema.org/latitude',
            'STOPTYPE' => 'https://schema.org/identifier',
            'BUSSTOP' => 'https://schema.org/BusStop',
            "geo" => "http://schema.org/geo",
            "latitude" => array(
            "@id" => "http://schema.org/latitude",
              "@type" => "xsd:float",
            ),
            "longitude" => array(
            "@id" => "http://schema.org/longitude",
              "@type" => "xsd:float",
            ),
            "xsd" => "http://www.w3.org/2001/XMLSchema#",
            ),
    );
    $output = $context + $array_decoded;
    //output for RDF
    echo json_encode($output, JSON_PRETTY_PRINT);
}
?>