<?php

include_once 'Bus_Stop.php';

class DataContext{
    public function getBusStopData(){
        $busStops = [];
        $headers = [];

        $file = fopen('../assets/data/busStopLocations.geojson', 'r');

        if($file)
        {
            $linecount = 0;
            $dataContent = file_get_contents($file);
            var_dump($dataContent);
            while($data = $dataContent($file, 1000, ","))
            {
                if($linecount > 0) {
                    $mapURL = "";
                    $coords = $this->data[3];
                    $stop = new Bus_Stop($data[0], $data[1], $data[2], $data[3], $coords, $mapURL );
                    $busStops = $stop;

                    $linecount++;
                }
                else
                {
                    $headers = $data;
                    $linecount++;
                }
            }
        }
        return $busStops;
    }
}