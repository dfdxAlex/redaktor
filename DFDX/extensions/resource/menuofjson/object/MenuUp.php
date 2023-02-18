<?php
namespace extensions\resource\menuofjson\object;

class MenuUp implements \class\nonBD\interface\InterfaceButton
{
    use \class\redaktor\interface\trait\TraitInterfaceButton;

    public function __construct()
    {

        if (isset($_POST['menuUp'])) {
            if ($_POST['menuUp']=='Создать меню') $_SESSION['new_menu']=1;
            if ($_POST['menuUp']=='Редактировать меню') $_SESSION['edit_menu']=1;
            if ($_POST['menuUp']=='Вернуться в начало') {
                $_SESSION['edit_menu']=0;
                $_SESSION['new_menu']=0;
            }
            if ($_POST['menuUp']=='Вернуться назад') {
                if ($_SESSION['edit_menu']>0) $_SESSION['edit_menu']--;
                if ($_SESSION['new_menu']>0) $_SESSION['new_menu']--;
            }
        }

        if ($_SESSION['new_menu']<1 && $_SESSION['edit_menu']<1)
            $this->formBlock('menuUpJson', '#', 'btn_start',
                             'submit',
                             'menuUp',
                             'Создать меню',
                             'submit',
                             'menuUp',
                             'Редактировать меню',
                            );
            else 
            $this->formBlock('menuUpJson', '#', 'btn_start',
                             'submit',
                             'menuUp',
                             'Вернуться в начало',
                             'submit',
                             'menuUp',
                             'Вернуться назад',
                            );
    }
}
