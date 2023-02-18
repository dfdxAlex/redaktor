<?php
namespace classCV;

// класс выводит кнопки Вперед, Назад, В начало
class Setting
{
    public function __construct()
    {
        $this->listenSaveSetting();
        // Проверяем есть ли переменные сессии, если нет, то обновляем их и создаем
        // число столбцов в поле задания скилов
        if (!isset($_SESSION['number_columns_skill_list'])) $_SESSION['number_columns_skill_list']=6;
        // размер шрифта в пикселах в списке скилов
        if (!isset($_SESSION['font_size_skill_list'])) $_SESSION['font_size_skill_list']=18;
        // высота строки
        if (!isset($_SESSION['row_size_skill_list'])) $_SESSION['row_size_skill_list']=18;
        

        $listSkillNumber=$this->settingListSkills();
        echo "
            <div class='container-fluid container-setting'>
                    $listSkillNumber
            </div>
        ";

        // Скрипт загружает событие, которое отслеживает вводимую информацию в число столбцов
        InstrumentStaticCV::loadFunctionEventLoad('listSkillNumberTest');
    }

    // функция настраивает параметры блока списка скилов
    function settingListSkills()
    {
        $text1 = new \class\nonBD\Translation('Введите число столбцов');
        $text2 = new \class\nonBD\Translation('Ввести размер шрифта');
        $text3 = new \class\nonBD\Translation('Высота строки');
        $titleBlock = new \class\nonBD\Translation('Настройки блока списка умений');
        return "
            <div class='row'>
                <div class='col-12'>
                    <p>$titleBlock</p>
                </div>
            </div>
            <div class='row'>
                <div class='col-1'>
                    <input type='number' name='listSkillNumber' min='1', max='12' id='listSkillNumber' form='form_setting' value='{$_SESSION['number_columns_skill_list']}'>
                </div>
                <div class='col-11'>
                    <label class='styleText' for='listSkillNumber'> $text1 </label>
                </div>
            </div>
            <div class='row'>
                <div class='col-1'>
                    <input type='number' name='listSkillFontSize' min='1', max='50' id='listSkillFontSize' form='form_setting' value='{$_SESSION['font_size_skill_list']}'>
                </div>
                <div class='col-11'>
                    <label class='styleText' for='listSkillFontSize'> $text2 </label>
                </div>
            </div>
            <div class='row'>
            <div class='col-1'>
                <input type='number' name='listSkillRowSize' min='1', max='50' id='listSkillRowSize' form='form_setting' value='{$_SESSION['row_size_skill_list']}'>
            </div>
            <div class='col-11'>
                <label class='styleText' for='listSkillFontSize'> $text3 </label>
            </div>
        </div>
        ";
    }

    function listenSaveSetting()
    {
        // если нет нажатой кнопки Сохранить настройки то выходим
        if (!isset($_REQUEST['save_setting'])) return;

        if ($_REQUEST['listSkillNumber']!='') $_SESSION['number_columns_skill_list']=$_REQUEST['listSkillNumber'];
        if ($_REQUEST['listSkillFontSize']!='') $_SESSION['font_size_skill_list']=$_REQUEST['listSkillFontSize'];
        if ($_REQUEST['listSkillRowSize']!='') $_SESSION['row_size_skill_list']=$_REQUEST['listSkillRowSize'];

        //$_SESSION['md5']='';
    }
}




// $_SESSION['number_columns_skill_list'] - содержит число столбцов в списке скилов
// $_SESSION['font_size_skill_list'] - содержит размер шрифта в списке скилов
// $_SESSION['row_size_skill_list'] - содержит высоту строки
