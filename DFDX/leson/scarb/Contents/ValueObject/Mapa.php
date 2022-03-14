<?php
namespace Contents\ValueObject;

//classa przyjmuje parametr mapy świata od użytkownika, czyści i zwraca
//класс прнимает параметр карты мира от пользователя, очищает и возвращает
class Mapa
{
    public function __construct()
    {
        if (isset($_POST['mapa']))
            $this->retUrn =$_POST['mapa'];
        else $this->retUrn='';

        $this->retUrn=preg_replace('/[^\(\)\*]/','',$this->retUrn);
    }

    public function __toString()
    {
        return  $this->retUrn;
    }

}
