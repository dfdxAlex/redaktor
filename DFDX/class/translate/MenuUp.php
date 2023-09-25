<?php
namespace src\libraries;

class MenuUp
{
    private $linkFromDelegatorLang;
    public function __construct($in)
    {
        $this->linkFromDelegatorLang=$in;

    }
    public function __toString()
    {
      $urlDown = \src\libraries\UrlLevel::urlLevel()->getUrlDown();
      $urlUp = \src\libraries\UrlLevel::urlLevel()->getUrlUp();
      
      /**
       * Инициализация объекта -переводчика DelegatorLang
       */
      //$obj = new \src\libraries\DelegatorLang();
      //$obj->setRedactorLang(false); // false - работа, true - редактор
      // $obj->setRedactorLang(true); // для редактирования
      //$obj->control();

      
      /**
       * Запуск метода translator() для получения результата
       */
      $go = $this->linkFromDelegatorLang->translator('Вперед');
      $back = $this->linkFromDelegatorLang->translator('Назад');
        
      return "
          <nav class=\"menu-up\">
            <ul class=\"menu-up--ul\">
              <li class=\"menu-up--li\">
                <a 
                  href=\"$urlDown\"
                  class=\"menu-up--a\"
                >
                 $back
                </a>
              </li>
              <li class=\"menu-up--li\">
                <a 
                  href=\"$urlUp\"
                  class=\"menu-up--a\"
                >
                  $go
                </a>
              </li>
            </ul>
          </nav>
        ";

        return '';
    }
}
