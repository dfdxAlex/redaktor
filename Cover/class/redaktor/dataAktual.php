<?php
namespace class\redaktor;

class dataAktual  extends initBd
{
    public function __construct()
        {
            parent::__construct();
            $this->con = mysqli_connect(parent::initBdHost(),parent::initBdLogin(),parent::initBdParol(),parent::initBdNameBD()) OR die ('ошибка подключения БД');   //подключить бд            mysqli_set_charset ( $con , "utf8" ) ;
            $zapros="SELECT "."*"." FROM statistik WHERE 1";
            $rez=parent::zaprosSQL($zapros) OR die ('Не удалось отправить запрос стр.17');
            $stroka=mysqli_fetch_assoc($rez) OR die ('Не удалось получить массив');
            $this->secondsSite=$stroka['SiteUpSec'];
            $this->minutesSite=$stroka['SiteUpMin'];
            $this->hoursSite=$stroka['SiteUpHours'];
            $this->mdaySite=$stroka['SiteUpDay'];
            $this->wdaySite=$stroka['SiteUpWday'];
            $this->monSite=$stroka['SiteUpMon'];
            $this->yearSite=$stroka['SiteUpYears'];
            $this->ydaySite=$stroka['SiteUpYday'];
            $this->weekdaySite=$stroka['SiteUpWeekday'];
            $this->monthSite=$stroka['SiteUpMonth'];
            $this->secondsBd=$stroka['BdUpSec'];
            $this->minutesBd=$stroka['BdUpMin'];
            $this->hoursBd=$stroka['BdUpHours'];
            $this->mdayBd=$stroka['BdUpDay'];
            $this->wdayBd=$stroka['BdUpWday'];
            $this->monBd=$stroka['BdUpMon'];
            $this->yearBd=$stroka['BdUpYears'];
            $this->ydayBd=$stroka['BdUpYday'];
            $this->weekdayBd=$stroka['BdUpWeekday'];
            $this->monthBd=$stroka['BdUpMonth'];
        }
        public function __destruct()
        {
            mysqli_close($this->con);
        }
        public function saveDataSite()            // Функция увеличивает на 1 число запросов к базе данных html
        {
            $masData=getdate( );
            $zapros="UPDATE statistik SET `SiteUpSec`=".$masData['seconds'].",`SiteUpMin`=".$masData['minutes'].",`SiteUpHours`=".$masData['hours'].",`SiteUpDay`=".$masData['mday'].",`SiteUpWday`=".$masData['wday'].",`SiteUpMon`=".$masData['mon'].",`SiteUpYears`=".$masData['year'].",`SiteUpYday`=".$masData['yday'].",`SiteUpWeekday`=".chr(34).$masData['weekday'].chr(34).",`SiteUpMonth`=".chr(34).$masData['month'].chr(34)." WHERE 1";
            $rez=parent::zaprosSQL($zapros);// OR die ('Не удалось отправить запрос стр.17');
        }
        public function saveDataBd()            // Функция увеличивает на 1 число запросов к базе данных html
        {
            $masData=getdate( );
            $zapros="UPDATE statistik SET `BdUpSec`=".$masData['seconds'].",`BdUpMin`=".$masData['minutes'].",`BdUpHours`=".$masData['hours'].",`BdUpDay`=".$masData['mday'].",`BdUpWday`=".$masData['wday'].",`BdUpMon`=".$masData['mon'].",`BdUpYears`=".$masData['year'].",`BdUpYday`=".$masData['yday'].",`BdUpWeekday`=".chr(34).$masData['weekday'].chr(34).",`BdUpMonth`=".chr(34).$masData['month'].chr(34)." WHERE 1";
            $rez=parent::zaprosSQL($zapros);// OR die ('Не удалось отправить запрос стр.17');
        }
} // Конец класса dataAktual
