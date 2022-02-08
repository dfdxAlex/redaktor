<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToFutter
{
    //use class\redaktor\interface\interface\InterfaceWorkToStatistik;

   // public function futterGeneral(InterfaceWorkToStatistik $interfaceStatistik)
   // {

   // }

    public function closeHtmlDok()
    {
      echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
      </body>
      </html>';
    }

    public function futterR(...$parametr)
     {
      $bootStrap=false;
      $container='-fluid';
      $dataSozdania='';
      $classPole='';
      // Ищем параметр подключающий бутстрап
      foreach($parametr as $value)
        if (stripos('sss'.$value,'bootstrap'))
          $bootStrap=true;

      //ищем приставку к классу container
      foreach($parametr as $value)
        if (stripos('sss'.$value,'container='))
          $container='-'.preg_replace('/container=/','',$value); // Выделяем логин редактора/ов

      //ищем создания сайта
      foreach($parametr as $value)
        if (stripos('sss'.$value,'дата:'))
          $dataSozdania=preg_replace('/дата:/','',$value); // Выделяем логин редактора/ов

      //ищем имя класса главного поля
      foreach($parametr as $value)
        if (stripos('sss'.$value,'pole='))
        $classPole=preg_replace('/pole=/','',$value); // Выделяем логин редактора/ов

      foreach($parametr as $value)
      if ($value=='help' || $value=='Помощь') {
           echo '<p>Функция выводит нижний блок</p>';
           echo '<p>Параметры функции произвольные и задаются как обычно!</p>';
           echo '<p>Функция проверяет все параметры и по ключевым словам определяет с каким параметром, что следует делать.</p>';
           echo '<p>Параметров произвольное колличество</p>';
           echo '<p>Для настройки блока под бутстрап необходимо вписать параметр "bootstrap"</p>';
           echo '<p>Для задания приставки к классу container-...fluid задаем дополнительный параметр "container=...fluid"</p>';
           echo '<p>по умолчанию параметр container=fluid</p>';
           echo '<p>Дальше выводимая информация</p>';
           echo '<p>Дата создания сайта задается параметром "дата:18.02.2021"</p>';
           echo '<p></p>';
           echo '<p></p>';
           echo '<p>Работа с классами</p>';
           echo '<p>Задать имя класса главного поля можно через параметр "pole=имя класса"</p>';
           echo '<p>По умолчанию есть класс futter заданный в стилях движка, после него идёт класс заданный с помощью pole=</p>';
           echo '<p></p>';
        }
        // Выводим футтер
      if ($bootStrap) echo '<section class="container'.$container.'">';
      if ($bootStrap) echo '<div class="row">';
      if ($classPole=='') echo '<div class="futtrer">';
      if ($classPole!='') echo '<div class='.$classPole.'>';
      if ($dataSozdania!='') echo '<p>Дата создания сайта:'.$dataSozdania.'</p>';
      echo '</div>';
      if ($bootStrap) echo '</div>';
      if ($bootStrap) echo '</section>';
     }

     public function dataRedaktSite()
     {
      //  echo ("<h3>Статистика обращений к базам данных</h3>");
       // echo '<h4>Обращений к базе HTML:'.$this->stHtml.'</h4>';
       // $chislo="".$this->mdaySite;   // нормализация числа даты, вместо 1.12.2021 --> 01.12.2021
       // if ($this->mdaySite<10) $chislo="0".$this->mdaySite;
       // $dat="".$this->monSite;   // нормализация месяца даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->monSite<10) $dat="0".$this->monSite;
       // $min="".$this->minutesSite;   // нормализация минут даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->minutesSite<10) $min="0".$this->minutesSite;
       // $sek="".$this->secondsSite;   // нормализация секунд даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->secondsSite<10) $sek="0".$this->secondsSite;
       // echo '<h5>Последнее изменение сайта '.$chislo.'.'.$dat.'.'.$this->yearSite.'. <span>Время изменения <span>'.$this->hoursSite.':'.$min.':'.$sek.'</span></span></h5>';
       // $chislo="".$this->mdayBd;   // нормализация числа даты, вместо 1.12.2021 --> 01.12.2021
       // if ($this->mdayBd<10) $chislo="0".$this->mdayBd;
       // $dat="".$this->monBd;   // нормализация месяца даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->monBd<10) $dat="0".$this->monBd;
       // $min="".$this->minutesBd;   // нормализация минут даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->minutesBd<10) $min="0".$this->minutesBd;
       // $sek="".$this->secondsBd;   // нормализация секунд даты, вместо 01.2.2021 --> 01.02.2021
       // if ($this->secondsBd<10) $sek="0".$this->secondsBd;
       // echo '<h5>Последнее изменение БД '.$chislo.'.'.$dat.'.'.$this->yearBd.'. <span>Время изменения <span>'.$this->hoursBd.':'.$min.':'.$sek.'</span></span></h5>';
       // echo '<h6>Используемые языки: HTML,CSS,PHP,MySQL</h6>';
     }
}
