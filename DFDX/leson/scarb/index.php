<?php
namespace Contents;

// Program mógł być napisany w jednym pliku, ale chciałem użyć więcej sztuczek programowania php
// Программу можно было написать в одном файле, но я хотел задействовать больше приёмов программирования в php
// Wszystkie komentarze są napisane w dwóch językach, dla Twojej wygody)
// Все комментарии написаны на двух языках, для моего у Вашего удобства)

require "Contents/autoloader.php";

use \Contents\ValueObject\Mapa;
use \Contents\ValueObject\WhereTreasure;

//funkcja wyprowadza znaczniki początkowe strony
//функция выводит начальные теги страницы
echo new MetaTegiStart('scarb');

echo '<body>';
  
//formularz wprowadzania mapy świata--->
//форма ввода карты мира--->
echo new FormInputMape();

//classa przyjmuje parametr mapy świata od użytkownika, czyści i zwraca
//класс принимает параметр карты мира от пользователя ($_POST['mapa']), очищает и возвращает
$mapaSwiata = new Mapa();
echo '<div class="mapa-clear">Mapa świata: '.$mapaSwiata.'</div>';

// Obiekt SearchScarb() zwraca informację o pierwszym indeksie, który odpowiada maksymalnej liczbie skarbów na podłodze
// объект SearchScarb() возвращает информацию о первом индексе, который соответствует максимальному числу кладов на этаже
echo '<div class="first-index">
       Wskaźnik poziomu minimalnego z maksymalną liczbą klad: '.new SearchScarb($mapaSwiata, new WhereTreasure()).
     '</div>';

echo '
</body>
</html>';
