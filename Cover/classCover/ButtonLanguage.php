<?php
namespace classCover;

// класс хранит данные выбора языка пользователя
class ButtonLanguage
{
    public function __toString()
    {
        return '
        <div class="btn button-language">
            <form action="#" method="post">
                <input  class="btn btn-info" type="submit" name="pl" value="pl">
                <input  class="btn btn-info" type="submit" name="en" value="en">
                <input  class="btn btn-info" type="submit" name="ua" value="ua">
                <input  class="btn btn-info" type="submit" name="ru" value="ru">
            </form>
        </div>
        ';
    }
}
