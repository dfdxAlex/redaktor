<?php
namespace classCV;

// класс выводит кнопки Вперед, Назад, В начало
class ButtonMenuUp
{
    public function __toString()
    {
        return '
        <nav class="btn button-language menu-nav">
            <form action="#" method="post">
                <input type="submit" name="next" value="'.new Translation('Вперед').'">
                <input type="submit" name="back" value="'.new Translation('Назад').'">
                <input type="submit" name="main" value="'.new Translation('На главную').'">
            </form>
        </nav>
        ';
    }

}
