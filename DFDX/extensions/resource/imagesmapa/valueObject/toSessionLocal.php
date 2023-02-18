<?php
namespace extensions\resource\imagesmapa\valueObject;

// класс проверяет список необходимых переменных сессий и если их нет, создает
class toSessionLocal
{
    public function __construct()
    {
        if (!isset($_SESSION['imagesMapaMenuUp'])) $_SESSION['imagesMapaMenuUp']='';
        if (!isset($_SESSION['imagesMapaPathImageTmp'])) $_SESSION['imagesMapaPathImageTmp']='';
        if (!isset($_SESSION['imagesMapaWightTmp'])) $_SESSION['imagesMapaWightTmp']='';
        if (!isset($_SESSION['imagesMapaHeightTmp'])) $_SESSION['imagesMapaHeightTmp']='';
    }

    // функция возвращает следующий свободный номер для записи координат
    public function klacNumerEnd()
    {
        $i=0;
        $koraXmax='';
         foreach ($_SESSION as $key=>$value) {
             if (stripos($key,'klacX')!==false) {
                $koraXmax=$key;
             }
         }
         $i=preg_replace('/klacX/','',$koraXmax);

        return ++$i;
    }

    // функция очищает одинаковые пары координат в переменных сессий
    public function killDubli()
    {
        // перебираю весь массив сессион
        foreach ($_SESSION as $key=>$value) {
            // если попался элемент со словок klacX, то работаем с ним
            if (stripos($key,'klacX')!==false) {
                foreach ($_SESSION as $key2=>$value2) {
                    if (stripos($key2,'klacX')!==false) {
                        if ($_SESSION[$key]==$_SESSION[$key2] && $key!=$key2) {
                            $key=preg_replace('/X/','Y',$key);
                            $key2=preg_replace('/X/','Y',$key2);
                            if ($_SESSION[$key]==$_SESSION[$key2]) {
                                unset($_SESSION[$key]);
                                $key=preg_replace('/Y/','X',$key);
                                unset($_SESSION[$key]);
                                break 1;
                            }
                        }
                    }
                }
            }
        }
    }

    // функция создает и возвращает массив координат из переменный сессий
    public function sessionToMas()
    {
        $masRez=array(array(),array());
        $i=0;
        foreach ($_SESSION as $key=>$value) {
            if (stripos($key,'klacX')!==false) {
                $masRez[0][$i]=$value;
                $nameY=preg_replace('/X/','Y',$key);
                $masRez[1][$i]=$_SESSION[$nameY];
                $i++;
            }
        }
        return $masRez;
    }
}
