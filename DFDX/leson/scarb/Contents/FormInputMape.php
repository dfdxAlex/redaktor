<?php
namespace Contents;

class FormInputMape
{
    public function __construct()
    {
    //formularz wprowadzania mapy świata--->
    //форма ввода карты мира--->
    $this->retUrn = '
    <div class="form-mapa">
    <form action="index.php" method="post">
        <input type="text" placeholder="Mapa świata" name="mapa">
        <input type="submit" name="startSearch" value="Search">
    </form><br>
    </div>';
    }

    public function __toString()
    {
        return $this->retUrn;
    }

}
