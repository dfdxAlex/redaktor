<?php
namespace ValueObject;

// The class collects all the necessary elements from the form and forms a new array element
// Класс собирает все необходимые элементы из формы и формирует новый элемент массива
class FormToMas
{
    public function __construct()
    {
        $this->noError=true;
        $this->masRez = array (array(),array(),array());

        // Получить значение ID
        $varTime = new ToId(new \Object\CreateTable);
        $this->masRez['id'] = $varTime->idInteger();

        // Получить значение NAME
        $varTime = new ToName();
        $this->masRez['name'] = $varTime->getName();
        if ($this->masRez['name']=='null') $this->noError=false;

        // Получить значение username
        $varTime = new ToUserName();
        $this->masRez['username'] = $varTime->getUserName();
        if ($this->masRez['username']=='null') $this->noError=false;

        // Получить значение email
        $varTime = new ToEmail();
        $this->masRez['email'] = $varTime->getEmeil();
        if ($this->masRez['email']=='null') $this->noError=false;

        // Получить значение [address][street] 
        $varTime = new ToStreet();
        $this->masRez['address']['street'] = $varTime->getStreet(); 
        if ($this->masRez['address']['street']=='null') $this->noError=false;

        // Получить значение [address][suite]
        $varTime = new ToSuite();
        $this->masRez['address']['suite'] = $varTime->getSuite(); 
        if ($this->masRez['address']['suite']=='null') $this->noError=false;

        // Получить значение [address][city]
        $varTime = new ToCity();
        $this->masRez['address']['city'] = $varTime->getCity(); 
        if ($this->masRez['address']['city']=='null') $this->noError=false;

        // Получить значение [address][zipcode]
        $varTime = new ToZip();
        $this->masRez['address']['zipcode'] = $varTime->getZip(); 
        if ($this->masRez['address']['zipcode']=='null') $this->noError=false;

        // Получить значение [address][geo][lat]
        $varTime = new ToGeoLat(new Geo);
        $this->masRez['address']['geo']['lat'] = $varTime->getGeoLat(); 

        // Получить значение [address][geo][lon]
        $varTime = new ToGeoLon(new Geo);
        $this->masRez['address']['geo']['lng'] = $varTime->getGeoLon(); 

        // Получить значение ToPhone 
        $varTime = new ToPhone();
        $this->masRez['phone'] = $varTime->getPhone();
        if ($this->masRez['phone']=='null') $this->noError=false;

        // Получить значение  website
        $varTime = new ToWebsite();
        $this->masRez['website'] = $varTime->getWebsite();

        // Получить значение [company][name]
        $varTime = new ToNameCompany();
        $this->masRez['company']['name'] = $varTime->getNameCompany(); 
        if ($this->masRez['company']['name']=='null') $this->noError=false;

        // Получить значение [company][catchPhrase]
        $varTime = new ToCompanySlogan();
        $this->masRez['company']['catchPhrase'] = $varTime->getCompanySlogan(); 

        // Получить значение [company][bs]
        $varTime = new ToCompanyBS();
        $this->masRez['company']['bs'] = $varTime->getCompanyBS(); 
    }

    public function getElementMas()
    {
        return $this->masRez;
    }

    public function getError()
    {
        return $this->noError;
    }
}
