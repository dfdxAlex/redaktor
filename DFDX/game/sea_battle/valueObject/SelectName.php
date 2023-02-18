<?php
namespace game\sea_battle\valueObject;

//класс проверяет был ли ввод имени пользователя, если был, то имя очищается от нежелательных символов, 
//после этого проверяется база данных и если имени нет, то оно заносится в базу данных и в переменную 
//Если имя уже есть в базе данных, то проверяем пароль,если он совпадает, то имя принимается
//сессий $_SESSION['sea_battle_user_name']

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

            'poleN=password',
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
            'span',
            'User Name ',
            'text',
            'userName',
            '_',
            'span',
            ' Password ',
            'password',
            'userPassword',
            '',
            'submit',
            'userNameOk',
            'Select',
        );

        //проверяем была ли нажата кнопка ввода имени
        if (isset($_POST['userNameOk'])) {  // если была нажата кнопка ввода имени
            $_SESSION['sea_battle_user_name']=$_POST['userName'];

            if ($_POST['userPassword']!='') { // если пользователь ввёл пароль
                //очищаем имя от различных символов
                $_SESSION['sea_battle_user_name']=preg_replace('/[^a-zA-Z\d]/i','',$_SESSION['sea_battle_user_name']);

                //проверяем в базе данных свободно ли имя
                $zapros="select id from sea_battle_user where name='".$_SESSION['sea_battle_user_name']."'";
                $rez=$this->zaprosSQL($zapros);
                $stroka=mysqli_fetch_array($rez);
                if (!$this->notFalseAndNULL($stroka)) { //если имени нет в БД то записать его с очередным ID
                    $id=$this->maxIdLubojTablicy('sea_battle_user');
                    $zapros="INSERT INTO sea_battle_user(id, name, password) VALUES (".$id.",'".$_SESSION['sea_battle_user_name']."','".$_POST['userPassword']."')";
                    $this->zaprosSQL($zapros);
                    $_SESSION['sea_battle_user_step']=2;
                } else { //если имя есть в БД то проверить пароль
                    $zapros="select password from sea_battle_user where name='".$_SESSION['sea_battle_user_name']."'";
                    $rez=$this->zaprosSQL($zapros);
                    $stroka=mysqli_fetch_array($rez);
                    if ($stroka[0]!=$_POST['userPassword']) {
                        echo '<p class="nameError">The password is not correct for the given name</p>';
                        $_SESSION['sea_battle_user_name']='';
                    } else {
                        $_SESSION['sea_battle_user_step']=2;
                    }
                }
            } else { // если пароль не ввели, то сообщить об этом
                echo '<p class="nameError">Bad password</p>';
                $_SESSION['sea_battle_user_name']='';
            }
        }

    }
}
