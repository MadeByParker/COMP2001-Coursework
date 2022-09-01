<?php

class Bus_Stop
{
    private $area;
    private $street;
    private $location;
    private $stoptype;
    private $coords = [];
    private $mapURL;

    public function __construct($Area, $Street, $Location, $StopType, $Coords, $MapURL)
    {
        $this->area = $Area;
        $this->street = $Street;
        $this->location = $Location;
        $this->stoptype = $StopType;
        $this->coords = $Coords;
        $this->mapURL = $MapURL;

    }

    public function getArea(){
        return $this->area;
    }

    public function getStreet(){
        return $this->street;
    }

    public function getLocation(){
        return $this->area;
    }

    public function getStopType(){
        return $this->stoptype;
    }

    public function getCoords(){
        return $this->coords;
    }

    public function getMapURL(){
        return $this->mapURL;
    }


}