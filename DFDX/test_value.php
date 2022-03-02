<?php

// oszczędzaj walutę
// запоминаем валюту
class Currency implements Stringable
{
    private $currency;
    private $country;
    private $kod;
    private $errorCod;

    public function __construct($currency)
    {
        $currency=mb_strtoupper($currency);
        
        // więcej informacji niż potrzeba, podwaliny na przyszłość
        // информации больше, чем необходимо, задел на будущее
        $result = match ($currency) {
            'AFA' => array('Afghan Afghani', '971'),
            'AWG' => array('Aruban Florin', '533'),
            'AUD' => array('Australian Dollars', '036'),
            'ARS' => array('Argentine Pes', '032'),
            'AZN' => array('Azerbaijanian Manat', '944'),
            'BSD' => array('Bahamian Dollar', '044'),
            'BDT' => array('Bangladeshi Taka', '050'),
            'BBD' => array('Barbados Dollar', '052'),
            'BYR' => array('Belarussian Rouble', '974'),
            'BOB' => array('Bolivian Boliviano', '068'),
            'BRL' => array('Brazilian Real', '986'),
            'GBP' => array('British Pounds Sterling', '826'),
            'BGN' => array('Bulgarian Lev', '975'),
            'KHR' => array('Cambodia Riel', '116'),
            'CAD' => array('Canadian Dollars', '124'),
            'KYD' => array('Cayman Islands Dollar', '136'),
            'CLP' => array('Chilean Peso', '152'),
            'CNY' => array('Chinese Renminbi Yuan', '156'),
            'COP' => array('Colombian Peso', '170'),
            'CRC' => array('Costa Rican Colon', '188'),
            'HRK' => array('Croatia Kuna', '191'),
            'CPY' => array('Cypriot Pounds', '196'),
            'CZK' => array('Czech Koruna', '203'),
            'DKK' => array('Danish Krone', '208'),
            'DOP' => array('Dominican Republic Peso', '214'),
            'XCD' => array('East Caribbean Dollar', '951'),
            'EGP' => array('Egyptian Pound', '818'),
            'ERN' => array('Eritrean Nakfa', '232'),
            'EEK' => array('Estonia Kroon', '233'),
            'EUR' => array('Euro', '978'),
            'GEL' => array('Georgian Lari', '981'),
            'GHC' => array('Ghana Cedi', '288'),
            'GIP' => array('Gibraltar Pound', '292'),
            'GTQ' => array('Guatemala Quetzal', '320'),
            'HNL' => array('Honduras Lempira', '340'),
            'HKD' => array('Hong Kong Dollars', '344'),
            'HUF' => array('Hungary Forint', '348'),
            'ISK' => array('Icelandic Krona', '352'),
            'INR' => array('Indian Rupee', '356'),
            'IDR' => array('Indonesia Rupiah', '360'),
            'ILS' => array('Israel Shekel', '376'),
            'JMD' => array('Jamaican Dollar', '388'),
            'JPY' => array('Japanese yen', '392'),
            'KZT' => array('Kazakhstan Tenge', '368'),
            'KES' => array('Kenyan Shilling', '404'),
            'KWD' => array('Kuwaiti Dinar', '414'),
            'LVL' => array('Latvia Lat', '428'),
            'LBP' => array('Lebanese Pound', '422'),
            'LTL' => array('Lithuania Litas', '440'),
            'MOP' => array('Macau Pataca', '446'),
            'MKD' => array('Macedonian Denar', '807'),
            'MGA' => array('Malagascy Ariary', '969'),
            'MYR' => array('Malaysian Ringgit', '458'),
            'MTL' => array('Maltese Lira', '470'),
            'BAM' => array('Marka', '977'),
            'MUR' => array('Mauritius Rupee', '480'),
            'MXN' => array('Mexican Pesos', '484'),
            'MZM' => array('Mozambique Metical', '508'),
            'NPR' => array('Nepalese Rupee', '524'),
            'ANG' => array('Netherlands Antilles Guilder', '532'),
            'TWD' => array('New Taiwanese Dollars', '901'),
            'NZD' => array('New Zealand Dollars', '554'),
            'NIO' => array('Nicaragua Cordoba', '558'),
            'NGN' => array('Nigeria Naira', '566'),
            'KPW' => array('North Korean Won', '408'),
            'NOK' => array('Norwegian Krone', '578'),
            'OMR' => array('Omani Riyal', '512'),
            'PKR' => array('Pakistani Rupee', '586'),
            'PYG' => array('Paraguay Guarani', '600'),
            'PEN' => array('Peru New Sol', '604'),
            'PHP' => array('Philippine Pesos', '608'),
            'QAR' => array('Qatari Riyal', '634'),
            'RON' => array('Romanian New Leu', '946'),
            'RUB' => array('Russian Federation Ruble', '643'),
            'SAR' => array('Saudi Riyal', '682'),
            'CSD' => array('Serbian Dinar', '891'),
            'SCR' => array('Seychelles Rupee', '690'),
            'SGD' => array('Singapore Dollars', '702'),
            'SKK' => array('Slovak Koruna', '703'),
            'SIT' => array('Slovenia Tolar', '705'),
            'ZAR' => array('South African Rand', '710'),
            'KRW' => array('South Korean Won', '410'),
            'LKR' => array('Sri Lankan Rupee', '144'),
            'SRD' => array('Surinam Dollar', '968'),
            'SEK' => array('Swedish Krona', '752'),
            'CHF' => array('Swiss Francs', '756'),
            'TZS' => array('Tanzanian Shilling', '834'),
            'THB' => array('Thai Baht', '764'),
            'TTD' => array('Trinidad and Tobago Dollar', '780'),
            'TRY' => array('Turkish New Lira', '949'),
            'AED' => array('UAE Dirham', '784'),
            'USD' => array('US Dollars', '840'),
            'UGX' => array('Ugandian Shilling', '800'),
            'UAH' => array('Ukraine Hryvna', '980'),
            'UYU' => array('Uruguayan Peso', '858'),
            'UZS' => array('Uzbekistani Som', '860'),
            'VEB' => array('Venezuela Bolivar', '862'),
            'VND' => array('Vietnam Dong', '704'),
            'AMK' => array('Zambian Kwacha', '894'),
            'ZWD' => array('Zimbabwe Dollar', '716'),
            default => false,
        };

        if ($result===false) {
            $this->currency=false;
            $this->country=false;
            $this->kod=false;
            $this->errorCod="Nieznana waluta";
        }
        else {
            $this->currency=$currency;
            $this->country=$result[0];
            $this->kod=$result[1];
        }

    }

    public function __toString()
    {
        if ($this->currency) return $this->currency;
        else return '';
    }

    public function err()
    {
        return $this->errorCod;
    }

}

// класс данных число денег
class Nomer
{
    private $nomer;
    private $errorCod;

    public function __construct($nomer)
    {
       if (gettype($nomer)=='integer' || gettype($nomer)=='double') 
           $this->nomer=$nomer;
       else {
            $this->nomer=false;
            $this->errorCod="Zła ilość pieniędzy";
       }
    }

    public function __toString()
    {
        if ($this->nomer) return $this->nomer;
        else return "";
    }

    public function err()
    {
        return $this->errorCod;
    }

    public function getNomer()
    {
        return $this->nomer;
    }
}

class Money
{
    private $a;
    private $b;
    private $currency;
    private $operation;

    public function __construct(Nomer $a, Nomer $b, Currency $currency, string $operation)
    {
       $this->a=$a->getNomer();
       $this->b=$b->getNomer();
       $this->currency=$currency;
       $this->operation=$operation;
    }

    public function sumMoney()
    {
       return $this->a+$this->b;
    }

    public function subMoney()
    {
       return $this->a-$this->b;
    }

    public function multMoney()
    {
       return $this->a*$this->b;
    }

    public function divMoney()
    {
       return $this->a/$this->b;
    }

    public function __toString()
    {
               if ($this->operation=='sum') return $this->sumMoney().' '.$this->currency;
               if ($this->operation=='sub') return $this->subMoney().' '.$this->currency;
               if ($this->operation=='mult') return $this->multMoney().' '.$this->currency;
               if ($this->operation=='div') return $this->divMoney().' '.$this->currency;
    }
}


