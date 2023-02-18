<?php
namespace game\tic_tac_toe\ClassFoTicTacToe;

// Класс реализовывает функцию накопления данных от игроков, анализ этих данных и формирование на основе этих данных
// стратегии игры.
// Klasa implementuje funkcję gromadzenia danych od graczy, analizowania tych danych i formowania na ich podstawie
// strategie gry.
// The class implements the function of accumulating data from players, analyzing this data and forming based on this data
// game strategies.
class Intelligence implements \class\redaktor\interface\interface\InterfaceWorkToBd
{
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
    use \class\redaktor\interface\trait\TraitInterfaceDebug;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToType;

    public function __construct()
    {
     $this->connectToBd();
     $this->tableValidationCMS();
    }

    // функция создает из переменных сессий одну строку и возвращает её.
    // используются переменные сессий ходов компьютера и человека
    // function creates a single string from session variables and returns it.
    // uses session variables of computer and human moves
    public function getMasMoveStr()
    {
        $strOur='';
        for ($i=1; $i<10; $i++)
            $strOur.=$_SESSION['move'.$i];
        return $strOur;
    }

    public function artificialIntelligenceMove()
    {

        // определяем информацию о каком ходе следует вытянуть из БД
        $move=$_SESSION['nomer_move']+1;
        if ($move>9) $move=9;
        $masRez = array();
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Первый шаг илгоритма ИИ.
        // Поиск самой короткой выигрышной комбинации в базе данных
        // Если такая комбинация будет найдена, то она выдается на выход в контроллер
        // Если такой комбинации нет на каком-то ходу игроков, то перейти на второй этап алгоритма
        // The first step of the AI algorithm.
         // Search for the shortest winning combination in the database
         // If such a combination is found, then it is output to the controller
         // If there is no such combination at some turn of the players, then go to the second stage of the algorithm
        $zapros='SELECT * FROM tic_tac_toe '.$this->alreadyMadeMoves();
        $rez=$this->zaprosSQL($zapros);
        $summStart=999999999999;
        $id=0;
            while (!is_null($stroka=mysqli_fetch_assoc($rez))) {
                $summ=$stroka['move1']+$stroka['move2']*10+$stroka['move3']*100+$stroka['move4']*1000
                      +$stroka['move5']*10000+$stroka['move6']*100000+$stroka['move7']*1000000
                      +$stroka['move8']*10000000+$stroka['move9']*100000000;
                if ($summStart>$summ) {
                    $summStart=$summ;
                    $id=$stroka['id'];
                }
            }
        // нашли ID самой короткой комбинации
        // дальше нужно достать нужную цифру для текущего хода
        // found the ID of the shortest combination
         // then you need to get the desired number for the current move
        $zapros='SELECT move'.$move.' FROM tic_tac_toe '.$this->alreadyMadeMoves().' AND id='.$id;
        $rez=$this->zaprosSQL($zapros);
        if ($this->notFalseAndNULL($rez)) $stroka=mysqli_fetch_array($rez);
        if ($this->notFalseAndNULL($stroka)) return (int)$stroka[0];
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Второй этап, если не сработал первый.
        // На данном этапе производится поиск самой короткой комбинации проигрыша соперника
        // Если такой комбинации нет, то переходим к следующему этапу алгоритма
        // The second stage, if the first one did not work.
         // At this stage, the shortest losing combination of the opponent is searched
         // If there is no such combination, then go to the next stage of the algorithm
        else {
              // если нет своих выигрышных комбинаций, то ищем среди проигрышных комбинаций противника
              $zapros='SELECT * FROM tic_tac_toe '.$this->alreadyMadeMoves('Lost');
              $rez=$this->zaprosSQL($zapros);
              $summStart=999999999999;
              $id=0;
                  while (!is_null($stroka=mysqli_fetch_assoc($rez))) {
                      $summ=$stroka['move1']+$stroka['move2']*10+$stroka['move3']*100+$stroka['move4']*1000
                            +$stroka['move5']*10000+$stroka['move6']*100000+$stroka['move7']*1000000
                            +$stroka['move8']*10000000+$stroka['move9']*100000000;
                      if ($summStart>$summ) {
                          $summStart=$summ;
                          $id=$stroka['id'];
                      }
                  }
              // нашли ID самой короткой  комбинации
              // дальше нужно достать нужную цифру для текущего хода
              // found the ID of the shortest combination
              // then you need to get the desired number for the current move
              $zapros='SELECT move'.$move.' FROM tic_tac_toe '.$this->alreadyMadeMoves('Lost').' AND id='.$id;
              $rez=$this->zaprosSQL($zapros);
              if ($this->notFalseAndNULL($rez)) $stroka=mysqli_fetch_array($rez);
              if ($this->notFalseAndNULL($stroka)) return (int)$stroka[0];
              ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              // Третий этап, здесь осуществляется поиск следующего хода противника, который может привести к его победе
              // Если такой ход будет найден, то он выдается на обработку.
              // Задача блока сработать на опережение, чтобы противник не смог реализовать свой план на победу
              // The third stage, here the next move of the opponent is searched for, which can lead to his victory
              // If such a move is found, then it is issued for processing.
              // The task of the block is to work ahead of the curve so that the enemy cannot realize his plan to win
              else {
                  $move++;
                  if ($move>9) $move=1;
                  $masRez = array();
                  $zapros='SELECT * FROM tic_tac_toe '.$this->alreadyMadeMoves('killWon'); 
                  $rez=$this->zaprosSQL($zapros);
                  $summStart=999999999999;
                  $id=0;
                      while (!is_null($stroka=mysqli_fetch_assoc($rez))) {
                          $summ=$stroka['move1']+$stroka['move2']*10+$stroka['move3']*100+$stroka['move4']*1000
                                +$stroka['move5']*10000+$stroka['move6']*100000+$stroka['move7']*1000000
                                +$stroka['move8']*10000000+$stroka['move9']*100000000;
                          if ($summStart>$summ) {
                              $summStart=$summ;
                              $id=$stroka['id'];
                          }
                      }

                  // нашли ID самой короткой  комбинации
                  // дальше нужно достать нужную цифру для текущего хода
                  // found the ID of the shortest combination
                  // then you need to get the desired number for the current move
                  $zapros='SELECT move'.$move.' FROM tic_tac_toe '.$this->alreadyMadeMoves('killWon').' AND id='.$id;
                  $rez=$this->zaprosSQL($zapros);
                  if ($this->notFalseAndNULL($rez)) $stroka=mysqli_fetch_array($rez);
                  if ($this->notFalseAndNULL($stroka)) return (int)$stroka[0];
              }
            }
        return false;
    }

    // функция создает условие для запроса в зависимости и используя уже проделанные ходы
    // функция использует переменные сессий
    // параметр nonRez нужно передавать тогда, когда результат не должен зависеть от выигрышной, проигрышней или паритетной ситуации
    public function alreadyMadeMoves($rezult='Won')
    {
        /////////////////////////////////////////////////////////////////////////////////////
        // определяем инициатора для запроса в БД
        $iniciator=0;
        if ($_SESSION['firstMoveConst']=="computer") $iniciator=1;
        // если ищем проигрышные комбинации, то ищим среди проигрышных комбинаций противника, значит нужно изменить инициатора
        if ($rezult=='Lost' && $iniciator==1) {$iniciator=0;}
        else if ($rezult=='Lost' && $iniciator==0) {$iniciator=1;}
        // Если пытаемся помешать противнику выиграть сработав на опережение, находим выигрышный следующий ход противника и ставим его
        if ($rezult=='killWon' && $iniciator==1) {$iniciator=0;$rezult='Won';}
        else if ($rezult=='killWon' && $iniciator==0) {$iniciator=1;$rezult='Won';}
        ////////////////////////////////////////////////////////////////////////////////////

        if ($rezult!='nonRez') {
            $rezOut="WHERE rezult='".$rezult."'";
            if ($_SESSION['move1']!=0) $rezOut.=' AND move1='.$_SESSION['move1'];
        }
        else {
            $rezOut='WHERE ';
            if ($_SESSION['move1']!=0) $rezOut.='move1='.$_SESSION['move1'];
        }
        
        if ($_SESSION['move2']!=0) $rezOut.=' AND move2='.$_SESSION['move2'];
        if ($_SESSION['move3']!=0) $rezOut.=' AND move3='.$_SESSION['move3'];
        if ($_SESSION['move4']!=0) $rezOut.=' AND move4='.$_SESSION['move4'];
        if ($_SESSION['move5']!=0) $rezOut.=' AND move5='.$_SESSION['move5'];
        if ($_SESSION['move6']!=0) $rezOut.=' AND move6='.$_SESSION['move6'];
        if ($_SESSION['move7']!=0) $rezOut.=' AND move7='.$_SESSION['move7'];
        if ($_SESSION['move8']!=0) $rezOut.=' AND move8='.$_SESSION['move8'];
        if ($_SESSION['move9']!=0) $rezOut.=' AND move9='.$_SESSION['move9'];

        if ($rezOut!='WHERE ') return $rezOut.' AND iniciator='.$iniciator;
        else return 'WHERE iniciator='.$iniciator;
    }

    // функция записывает новые комбинации, если их ещё не было
    // входной параметр $rezult - это строка, содержащая одно из трех слов Won Lost или Draw
    public function saveMasMove($rezult)
    {
        $stroka='';
        $rezultFromBd='';

        // создаем запрос для того, чтобы узнать есть ли уже данная комбинация
        $zapros='SELECT rezult FROM tic_tac_toe WHERE iniciator="'.$_SESSION['firstMove'].'" AND move1='.$_SESSION['move1'].
                ' AND move2='.$_SESSION['move2'].' AND move3='.$_SESSION['move3'].' AND move4='.$_SESSION['move4'].
                ' AND move5='.$_SESSION['move5'].' AND move6='.$_SESSION['move6'].' AND move7='.$_SESSION['move7'].
                ' AND move8='.$_SESSION['move8'].' AND move9='.$_SESSION['move9'];

        // запрос
        $rez=$this->zaprosSQL($zapros);
        // обработка запроса
        if ($this->notFalseAndNULL($rez)) $stroka=mysqli_fetch_array($rez); else return false;
        if ($this->notFalseAndNULL($stroka)) $rezultFromBd=$stroka[0];

        // определяем кто ходит первым, 1 - игрок, 0-компьютер
        $inicializ=1;
        if ($_SESSION['firstMoveConst']=="computer") $inicializ=0;
        $id=$this->maxIdLubojTablicy('tic_tac_toe');
        // Если комбинацию не нашли, то делаем запись в БД
        if ($rezultFromBd!=$rezult) {
            //echo 'Добавляю новую комбинацию <br>'; 
            $zapros="INSERT INTO tic_tac_toe(id, iniciator, move1, move2, move3, move4, move5, move6, move7, move8, move9, rezult) 
                     VALUES (".$id.",".$inicializ.",".$_SESSION['move1'].",".$_SESSION['move2'].",".
                     $_SESSION['move3'].",".$_SESSION['move4'].",".$_SESSION['move5'].",".$_SESSION['move6'].",".
                     $_SESSION['move7'].",".$_SESSION['move8'].",".$_SESSION['move9'].",'".$rezult."')";
            $rez=$this->zaprosSQL($zapros);
            //if ($this->notFalseAndNULL($rez)) 
                //echo 'Запись удалась <br>';
        }
    }
}
