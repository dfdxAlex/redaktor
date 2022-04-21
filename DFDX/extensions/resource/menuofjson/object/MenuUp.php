<?php
namespace extensions\resource\menuofjson\object;

class MenuUp implements \class\nonBD\interface\InterfaceButton
{
    use \class\redaktor\interface\trait\TraitInterfaceButton;

    public function __construct()
    {
        $this->formBlock('menuUpJson', '#', 'btn_start',
                         'submit',
                         'menuUp',
                         'Создать меню',
                         'submit',
                         'menuUp',
                         'Редактировать меню',
                        );
    }
}
