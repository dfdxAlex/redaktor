<?php
namespace class\classNew\analitic;
/**
 * Класс при создании устанавливает скрипт гугл аналитики
 * The class, when created, installs the google analytics script
 */
class GoogleAnalitic
{
    public function __construct($src = "https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ")
    {
      $userKod=preg_replace('/https:\/\/www\.googletagmanager\.com\/gtag\/js\?id=/','',$src);
      //https://www.googletagmanager.com/gtag/js?id=G-MF3F7YTKCQ //моя ссылка с моим кодом
      echo '<!-- Global site tag (gtag.js) - Google Analytics -->';
      echo '<script async src="'.$src.'"></script>';
      echo '<script>';
      echo 'window.dataLayer = window.dataLayer || [];';
      echo 'function gtag(){dataLayer.push(arguments);}';
      echo "gtag('js', new Date());";
      echo "gtag('config', '".$userKod."');";
      echo '</script>';
    }
}
