<?php
namespace class\translate\delegatorLang;

/**
 * Класс рисует кнопки для выбора языка сайта
 * Класс создан для стилизации кнопок выбора языка под стили Bootstrap
 * 
 */

class ButtonLangBootstrap extends ButtonLang
{
    /**
     * Так как переписывается конструктор, а конструктор суперкласса
     * не загружается, то необходимо принять переменную $in и в 
     * этом конструкторе тоже.
     */
    public function __construct($in)
    {
        $this->in = $in;

        echo '<div class="list-group lang-menu">';

        foreach($this->masUrl as $key=>$value) {
            $active='';
            if (toSolid\ReturnGetLang::returnGetLang() == $key) $active = "active";
            echo "<a href='$value' class='list-group-item list-group-item-action $active'>$key</a>";
        }

        echo '</div>';
    }
}
