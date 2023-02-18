<?php
namespace ValueObject;

// The class receives information about the user's localization by IP address
// Класс получает информацию о рокализации пользователя по IP адресу
class Geo
{
    private $country;
    private $countryCode;
    private $region;
    private $regionName;
    private $city;
    private $zip;
    private $lat;
    private $lon;
    private $timezone;
    private $isp;
    private $org;
    private $as;
    private $query;


    public function __construct()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        //$ip='142.250.186.196';

        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip.'?lang=en'));
        if($query && $query['status'] == 'success') {

                $this->country=$query['country'];
                $this->countryCode=$query['countryCode'];
                $this->region=$query['region'];
                $this->regionName=$query['regionName'];
                $this->city=$query['city'];
                $this->zip=$query['zip'];
                $this->lat=$query['lat'];
                $this->lon=$query['lon'];
                $this->timezone=$query['timezone'];
                $this->isp=$query['isp'];
                $this->org=$query['org'];
                $this->as=$query['as'];
                $this->query=$query['query'];

            } else {

                $this->country='';
                $this->countryCode='';
                $this->region='';
                $this->regionName='';
                $this->city='';
                $this->zip='';
                $this->lat='';
                $this->lon='';
                $this->timezone='';
                $this->isp='';
                $this->org='';
                $this->as='';
                $this->query='';
        }
    }

    public function getGeoParam($select)
    {
          return match ($select) {
              'country'=>$this->country,
          'countryCode'=>$this->countryCode,
               'region'=>$this->region,
           'regionName'=>$this->regionName,
                 'city'=>$this->city,
                  'zip'=>(string)$this->zip,
                  'lat'=>(string)$this->lat,
                  'lon'=>(string)$this->lon,
             'timezone'=>$this->timezone,
                  'isp'=>$this->isp,
                  'org'=>$this->org,
                   'as'=>$this->as,
                'query'=>$this->query,
          };
    }

    public function getAll()
    {
        echo 'country-'.$this->country.'<br>';
        echo 'countryCode-'.$this->countryCode.'<br>';
        echo 'region-'.$this->region.'<br>';
        echo 'regionName-'.$this->regionName.'<br>';
        echo 'city-'.$this->city.'<br>';
        echo 'zip-'.$this->zip.'<br>';
        echo 'lat-'.$this->lat.'<br>';
        echo 'lon-'.$this->lon.'<br>';
        echo 'timezone-'.$this->timezone.'<br>';
        echo 'isp-'.$this->isp.'<br>';
        echo 'org-'.$this->org.'<br>';
        echo 'as-'.$this->as.'<br>';
        echo 'query-'.$this->query.'<br>';
    }
}
