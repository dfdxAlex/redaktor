<?php
namespace ValueObject;

// object returns geoLon(geolocation coordinate) of the user or null string
// объект возвращает geoLon(координату геолокации) пользователя или строку null
class ToGeoLon
{
    public function __construct(\ValueObject\Geo $geo)
    {
        $this->geoLon=$geo->getGeoParam('lon');
        if ($this->geoLon=='') $this->geoLon='null';
    }

    public function __toString()
    {
        return $this->geoLon;
    }

    public function getGeoLon()
    {
        return $this->geoLon;
    }
}


