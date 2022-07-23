<?php
namespace classCV;

// класс хранит данные выбора языка пользователя
class ButtonLanguage
{
    public function __toString()
    {
        return '
        <div class="btn button-language">
            <form action="#" method="post">
                <input type="submit" name="en" value="en" class="btn button-language">
                <input type="submit" name="pl" value="pl" class="btn button-language">
                <input type="submit" name="ua" value="ua" class="btn button-language">
                <input type="submit" name="ru" value="ru" class="btn button-language">
            </form>
        </div>
        ';
    }
}
