<?php
namespace class\translate\delegatorLang;

/**
 * Класс рисует кнопки для выбора языка сайта
 */
class ButtonLang
{
    protected $in;
    public function __construct($in)
    {
        $this->in = $in;
        echo '<div class="menu-lang">';
        echo "<ul class={$this->classMode}ol>";
        foreach($this->masUrl as $key=>$value) {
            echo "<li class={$this->classMode}li><a href='$value' class={$this->classMode}a>$key</a></li>";
        }
        echo "</ul></div>";
    }

    public function __get($property)
    {
        return $this->in->getPropertyPrivate($property);
    }
}
