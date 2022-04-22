<?php
namespace extensions\resource\imagesmapa\object;

class MenuUp implements \class\nonBD\interface\InterfaceButton
{
    use \class\redaktor\interface\trait\TraitInterfaceButton;

    public function __construct()
    {
        // обрабатываем режим или шаг
        if (isset($_POST['imagesMapaMenuUp'])) {
            if ($_POST['imagesMapaMenuUp']=='Загрузить картинку') $_SESSION['imagesMapaMenuUp']=1;

        }

        // рисуем кнопки
        if ($_SESSION['imagesMapaMenuUp']<1 && $_SESSION['edit_menu']<1)
            $this->formBlock('imagesMapaMenuUp', '#', 'btn_start',
                             'submit',
                             'imagesMapaMenuUp',
                             'Загрузить картинку',
                            );
    }
}
