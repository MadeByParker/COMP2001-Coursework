<?php
    class DataAccess {
        public static function retrieveDataSet($file){
            $file_content = file_get_contents($file);
            return json_decode($file_content, true);
        }

        public static function displayTable($file): string
        {
            $html = "";
            $data = DataAccess::retrieveDataSet($file);
            $features = $data["features"];
            foreach($features as $feature) {
                $properties = $feature["properties"];

                $area = $properties["COMMONNAME"];
                $street = $properties["STREET"];
                $location = $properties["LOCALITY"];
                $stopType = $properties["STOPTYPE"];
                $latitude = $properties["LATITUTE"];
                $longitude = $properties["LONGITUDE"];

                $html .= '<tr><td>' . $area . '</td><td>' . $street . '</td><td>' . $location . '</td><td>' . $stopType . '</td><td>' . $latitude . ', ' . $longitude . '</td></tr>';


            }
            return $html;
        }
    }
?>