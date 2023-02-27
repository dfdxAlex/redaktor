<?php
namespace src\libraries;

class MenuUp
{
    public function __toString()
    {
      $urlDown = \src\libraries\UrlLevel::urlLevel()->getUrlDown();
      $urlUp = \src\libraries\UrlLevel::urlLevel()->getUrlUp();

        return "
          <nav class=\"menu-up\">
            <ul class=\"menu-up--ul\">
              <li class=\"menu-up--li\">
                <a 
                  href=\"$urlDown\"
                  class=\"menu-up--a\"
                >
                Back
                </a>
              </li>
              <li class=\"menu-up--li\">
                <a 
                  href=\"$urlUp\"
                  class=\"menu-up--a\"
                >
                  Forward
                </a>
              </li>
            </ul>
          </nav>
        ";

        return '';
    }
}
