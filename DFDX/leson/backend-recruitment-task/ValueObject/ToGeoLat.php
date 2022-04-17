<?php
namespace ValueObject;

// object returns geoLat(geolocation coordinate) of the user or null string
// объект возвращает geoLat(координату геолокации) пользователя или строку null
class ToGeoLat
{
    public function __construct(\ValueObject\Geo $geo)
    {
        $this->geoLat=$geo->getGeoParam('lat');
        if ($this->geoLat=='') $this->geoLat='null';
    }

    public function __toString()
    {
         return $this->geoLat;
    }

    public function getGeoLat()
    {
         return $this->geoLat;
    }
}


