<?php
namespace game\sea_battle\valueObject;

class SelectName implements \class\redaktor\interface\interface\InterfaceWorkToBd,
                            \class\nonBD\interface\InterfaceButton
{
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
    use \class\redaktor\interface\trait\TraitInterfaceDebug;
    use \class\redaktor\interface\trait\TraitInterfaceButton;

    public function __construct() 
    {
        $this->connectToBd();
        $this->createTab(
            'name=sea_battle_user',
            'poleN=id',
            'poleT=int',
            'poleS=0',
            'poleN=name',
            'poleT=VARCHAR(50)',
            'poleS= ',
            'poleN=number_game',
            'poleT=int',
            'poleS=0',
            'poleN=number_of_games_won',
            'poleT=int',
            'poleS=0',
            'poleN=number_of_games_lost',
            'poleT=int',
            'poleS=0',
        ); 

        $this->formBlock(
            'select-name',
            '#',
           // 'zero_style',
            'span',
            'User Name ',
            'text',
            'userName',
            '_',
            'submit',
            'userNameOk',
            'Select',
        );
    }
}
