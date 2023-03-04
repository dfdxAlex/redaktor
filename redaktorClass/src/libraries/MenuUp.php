<?php
namespace src\libraries;

class MenuUp
{
    public function __toString()
    {
      $urlDown = \src\libraries\UrlLevel::urlLevel()->getUrlDown();
      $urlUp = \src\libraries\UrlLevel::urlLevel()->getUrlUp();
      
      $obj = new \src\libraries\DelegatorLang();
      $obj->control();

      $go = $obj->translator('Вперед');
      $back = $obj->translator('Назад');
      // $back = $obj->translator('укаука');
        
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
