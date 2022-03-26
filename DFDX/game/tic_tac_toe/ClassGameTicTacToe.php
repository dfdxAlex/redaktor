<?php
namespace game\tic_tac_toe;

class ClassGameTicTacToe implements \class\redaktor\interface\interface\InterfaceButton
{
    use \class\redaktor\interface\trait\TraitInterfaceButton;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
    use \class\redaktor\interface\trait\TraitInterfaceDebug;

    // выбрать чем играть, крестиками или ноликами
    public function pickSide()
    {
        // проверяет существуют ли необходимые для работы переменные сессии, если нет, то создает их
        $choiceOfStones = new ValueObject\ValueCreateSession();
        unset($choiceOfStones);

        if (isset($_POST['Go'])) {
           
           // обнулить счётчик ходов
           $_SESSION['hit']=0;

           // создается служебный объект только ради того, чтобы в $_SESSION['x_o'] поместить камни игрока, крестики или нолики
           // больше объект $choiceOfStones не будет использоваться
           $choiceOfStones = new ValueObject\ValueXO();
           unset($choiceOfStones);

           // создается служебный объект только ради того, чтобы в $_SESSION['firstMove'] поместить инфу о том, кто ходит первый
           // больше объект $choiceOfStones не будет использоваться
           $choiceOfStones = new ValueObject\ValueWhoFirst();
           //unset($choiceOfStones);

           // создается служебный объект только ради того, чтобы в $_SESSION['gameDifficulty'] поместить сложность игры
           // больше объект $choiceOfStones не будет использоваться
           $choiceOfStones = new ValueObject\ValueGameDifficulty();
           unset($choiceOfStones);

           // создается служебный объект только ради того, чтобы:
           // очищаем переменные сессий, отвечающий за игровое поле
           $choiceOfStones = new ValueObject\ValueMasSession('reset');
           unset($choiceOfStones);

           // первый ход, если ходит первым компьютер, то делаем ход от компьютера и рисуем поле
           // если первый ход за игроком, то рисуем пустое поле
           $this->firstMove();

           // включить блокировку показа полного меню выбора.
           $_SESSION['blockBigMenu']=true;
        }


        // Если была нажата кнопка Reset, то отключить блокировку главного меню, то есть конец игре
        if (isset($_POST['Reset'])) $_SESSION['blockBigMenu']=false; 


        // если разблокировано основное меню обнулить счётчик ходов
        if (!$_SESSION['blockBigMenu']) $_SESSION['hit']=0;

        // Нарисовать главное меню или кнопку Reset, взависимости от состояния переменной $_SESSION['blockBigMenu']
        $choiceOfStones = new ClassFoTicTacToe\SettingMenu();

        // проверка не выиграл ли пользователь
        if ($this->gamesPlayed() && $_SESSION['blockBigMenu']) {
            $this->poleOnlineWonLostDraw('Won');
            return;
        }

        // проверяем была ли нажата любая кнопка на игровом поле
        $klac=(int)$this->hanterButton("rez=hant","nameStatic=pole","returnNameDynamic","false=qqq");
        
        // создается служебный объект только ради того, чтобы:
        // очищаем переменные сессий, отвечающий за игровое поле
        $_SESSION['firstMove']='player';
        $choiceOfStones = new ValueObject\ValueMasSession($klac);

        // если удалось нажать на крестик или нолик
        if ($choiceOfStones=='Ok') {

            // Проверяю не выиграл ли я после последнего хода
            if ($this->gamesPlayed()) {
                // если выиграл, то закрасить поле к зеленый цвет и выйти из метода
                $this->poleOnlineWonLostDraw('Won');
                return;
            }

            // Проверяю не выиграл ли я после последнего нажатия кнопки.
            if (!$this->gamesPlayed()) {
                // если не выиграл, то передать ход компьютеру
                $_SESSION['firstMove']='computer';
                // сделать ход компьютером
                $choiceOfStones = new ValueObject\ValueMasSession($this->computerMove());
            }
            // проверить не выиграл ли компьютер
            if ($this->gamesComputer())
                //если выиграл, то закрасить поле красным цветом
                $this->poleOnlineWonLostDraw('Lost');

        }

        // Проверка на ничью
        if (!$this->gamesPlayed())
        if (!$this->gamesComputer())
        if ($this->drawСheck()) {
            $this->poleOnlineWonLostDraw('Draw');
           // создается служебный объект только ради того, чтобы:
           // очищаем переменные сессий, отвечающий за игровое поле
           //$choiceOfStones = new ValueObject\ValueMasSession('reset');
           //unset($choiceOfStones);
            return;
        }

        if (!$this->gamesPlayed() && !$this->gamesComputer() && !$this->drawСheck())
        if ($_SESSION['hit']>0)
            $this->poleOnlineWonLostDraw();

        }

    // функция рисует первый раз игровое поле, если компьютер ходит первый, то делает первый ход компьютера
    function firstMove($user='computer')
    {
        if ($user!='computer') $_SESSION['firstMove']='player';

        if ($_SESSION['firstMove']=='computer') 
           // создается служебный объект только ради того, чтобы:
           // заносим первый ход компьютера в блок переменный сессий
           $choiceOfStones = new ValueObject\ValueMasSession($this->computerMove());
        $this->poleOnlineWonLostDraw();
    }

    // функция просто рисует поле 
    function poleOnlineWonLostDraw(string $type='game')
    {
        echo '<section class="container-fluid"><div class="row"><div class="col-12">';
        echo '<form action="#" method="post">
        <div class="gameMapa">';

    if ($type=='Won' || $type=='Lost' || $type=='Draw') {
        $class='';
        if ($type=='Won') {
            $class='gameMapaWon';
            $mesage='Hooray!! You won!';
        };
        if ($type=='Lost') {
            $class='gameMapaLost';
            $mesage='You should have better luck next time. Good luck.';
        };
        if ($type=='Draw') {
            $class='gameMapaDraw';
            $mesage='Hmm. The enemy was not so simple.';
        };
        echo '<h3>'.$mesage.'</h3>';
        for ($i=1; $i<10; $i++) {
            if ($_SESSION['pole'.$i]=='O') echo '<input class="'.$class.'" type="submit" value="O" name="pole'.$i.'">';
            if ($_SESSION['pole'.$i]=='X') echo '<input class="'.$class.'" type="submit" value="X" name="pole'.$i.'">';
            if ($_SESSION['pole'.$i]=='')  echo '<input class="'.$class.'" type="submit" value=" " name="pole'.$i.'">';
            if ($i==3 || $i==6) echo '<br>';
        } 
    }else {
        for ($i=1; $i<10; $i++) {
            if ($_SESSION['pole'.$i]=='O') echo '<input class="gameMapa'.$i.'" type="submit" value="O" name="pole'.$i.'">';
            if ($_SESSION['pole'.$i]=='X') echo '<input class="gameMapa'.$i.'" type="submit" value="X" name="pole'.$i.'">';
            if ($_SESSION['pole'.$i]=='')  echo '<input class="gameMapa'.$i.'" type="submit" value=" " name="pole'.$i.'">';
            if ($i==3 || $i==6) echo '<br>';
         }
    }
    
    echo '</div></form>';
    echo '</div></div></section>';
    }
    // Ход компьютера, если есть пустые места для хода, то находим вариант для хода
    function computerMove()
    {
        $kn=0;
        $numer=true;

        // узнаем сложность игры
        $levlGame = new ValueObject\ValueGameDifficulty();

        // проверяем какими камнями играет компьютер
        $mySimbol =  new ValueObject\ValueXO('computer');

        // если не легкий уровень игры то проверяем можно ли куда-то поставить свой крест или ноль для выигрыша
        // если такое место есть, то ставим
        if ($_SESSION['gameDifficulty']!='easy') {

            // узнаем какими камнями играет компьютер
            $x_o_comp = new ValueObject\ValueXO('computer');
            $x_o_comp_str=(string)$x_o_comp;
            // узнаем какими камнями играет игрок
            $x_o_player = new ValueObject\ValueXO();
            $x_o_player_str=(string)$x_o_player;

            // перебираем все клетки поля
            for ($i=1; $i<10; $i++) {
                // если очередная клетка поля пустая
                if ($_SESSION['pole'.$i]=='') {
                    // проверяем, если поместить камень компьютера на эту позицию закончится ли игра победой
                    if ($this->playerWon($i, $x_o_comp_str)) {
                        $_SESSION['pole'.$i]=$x_o_comp_str;
                        return $i;
                    }
                }
            }
            // если компьютер не нашел комбинацию для выигрыша проверить, не находится ли игрок накануне выигрыша
            // ессли игрок собрал 2 камня рядом, то заблокировать его победу своим камнем
            // перебираем все клетки поля
            for ($i=1; $i<10; $i++) {
                 // если очередная клетка поля пустая
                 if ($_SESSION['pole'.$i]=='') {
                     // проверяем, если поместить камень компьютера на эту позицию закончится ли игра победой
                     if ($this->playerWon($i,$x_o_player_str)) {
                         $_SESSION['pole'.$i]=$x_o_comp_str;
                         return $i;
                     }
                 }
            }

            // работа с треугольником победы)
            // если до сих пор не вышли, значит ещё нет возможности выиграть и нет угрозы проиграть
            // алгоритм работает при максимальной сложности игры
            //////////////////////////////////////////////////////////////////////////////////////////////////////    
            if ($levlGame=='impossible')
            {
                // если первый ход за игроком, то занимаем центр поля, если он ещё не занят
                // если первым ходит игрок и не занимает центр, то после занятия центра алгоритму-компьютеру достаточно 
                // просто не давать игроку выиграть, либо ходить случайно в пустые места, тогда игрок будет догонять компьютер,
                // не давая ему выиграть.
                if ($_SESSION['firstMoveConst']=='player') {
                    $choiceOfStones = new ValueObject\ValueMasSession(5);
                    if ($choiceOfStones!='error') return 5;

                    // если середина поля занята, туда сходил игрок, то следует поставить свой камень на один из углов поля
                    // данная ситуация сработает только один раз, дальше либо игрок будет не давать компьютеру выиграть
                    // либо компьютер не будет давать игроку выиграть.
                    // поэтому на этом этапе достаточно выбрать случайный угол для хода
                    if ($_SESSION['pole5']!=$mySimbol) {
                        $rezOut = match (rand(1,4)) {
                                   1 => 1,
                                   2 => 3,
                                   3 => 7,
                                   4 => 9,
                                  };
                        $choiceOfStones = new ValueObject\ValueMasSession($rezOut);  
                        if ($choiceOfStones!='error')
                            return $rezOut;    
                    }
                    // если центр поля занят компьютером, то разместить камень в любой неугол
                    // если так-же не исчерпаны возможности горизонтали и вертикали
                    if ($this->horizonVertical())
                    if ($_SESSION['pole5']==$mySimbol) {
                        $rezOutGood=true;
                        while ($rezOutGood) {
                        $rezOut = match (rand(1,4)) {
                                   1 => 2,
                                   2 => 4,
                                   3 => 6,
                                   4 => 8,
                                  };
                        if ($rezOut==2 && $_SESSION['pole8']=='') $rezOutGood=false;
                        if ($rezOut==4 && $_SESSION['pole6']=='') $rezOutGood=false;
                        if ($rezOut==6 && $_SESSION['pole4']=='') $rezOutGood=false;
                        if ($rezOut==8 && $_SESSION['pole2']=='') $rezOutGood=false;
                        }
                        $choiceOfStones = new ValueObject\ValueMasSession($rezOut);  
                        if ($choiceOfStones!='error')
                            return $rezOut;    
                    }
                }

                
                if ($_SESSION['firstMoveConst']=='computer') {
                    // если ходов ещё не было, то генерируем ход в один из углов поля
                    if ($_SESSION['hit']==0) {
                            $rezOut = match (rand(1,4)) {
                                             1 => 1,
                                             2 => 3,
                                             3 => 7,
                                             4 => 9,
                                            };
                            $choiceOfStones = new ValueObject\ValueMasSession($rezOut);  
                            return $rezOut;    
                    }

                    if ($_SESSION['hit']==1) {
                        // проверяем в каком углу наш первый камень
                        $ferstSymbol=0;
                        if ($_SESSION['pole1']==$mySimbol) $ferstSymbol=1;
                        if ($_SESSION['pole3']==$mySimbol) $ferstSymbol=3;
                        if ($_SESSION['pole7']==$mySimbol) $ferstSymbol=7;
                        if ($_SESSION['pole9']==$mySimbol) $ferstSymbol=9;
                        if ($ferstSymbol==1 && $_SESSION['pole2']=='' && $_SESSION['pole3']=='') $rezOut=3;
                        if ($ferstSymbol==1 && $_SESSION['pole4']=='' && $_SESSION['pole7']=='') $rezOut=7;

                        if ($ferstSymbol==3 && $_SESSION['pole2']=='' && $_SESSION['pole1']=='') $rezOut=1;
                        if ($ferstSymbol==3 && $_SESSION['pole6']=='' && $_SESSION['pole9']=='') $rezOut=9;

                        if ($ferstSymbol==7 && $_SESSION['pole4']=='' && $_SESSION['pole1']=='') $rezOut=1;
                        if ($ferstSymbol==7 && $_SESSION['pole8']=='' && $_SESSION['pole9']=='') $rezOut=9;

                        if ($ferstSymbol==9 && $_SESSION['pole6']=='' && $_SESSION['pole3']=='') $rezOut=3;
                        if ($ferstSymbol==9 && $_SESSION['pole8']=='' && $_SESSION['pole7']=='') $rezOut=7;
                        $choiceOfStones = new ValueObject\ValueMasSession($rezOut);  
                        return $rezOut;  
                    }

                    if ($_SESSION['hit']==2) {
                        // на третьем ходу, если сюда пришли, то нет угрозы проигрыша или вероятности выигрыша
                        // занимаем любой свободный угол
                        // после этого хода игра переходит на уровень выиграть или не дать выиграть противнику
                        $ferstSymbol=0;
                        if ($_SESSION['pole1']=='') $rezOut=1;
                        if ($_SESSION['pole3']=='') $rezOut=3;
                        if ($_SESSION['pole7']=='') $rezOut=7;
                        if ($_SESSION['pole9']=='') $rezOut=9;

                        $choiceOfStones = new ValueObject\ValueMasSession($rezOut);  
                        return $rezOut;  
                    }
                }
            }
            /////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        // проверка пустых полей
        if ($_SESSION['pole1']!='' 
            && $_SESSION['pole2']!=''
             && $_SESSION['pole3']!=''
              && $_SESSION['pole4']!=''
               && $_SESSION['pole5']!=''
                && $_SESSION['pole6']!=''
                 && $_SESSION['pole7']!=''
                  && $_SESSION['pole8']!=''
                   && $_SESSION['pole9']!=''
           ) return 0;

        // Если легкий вариант игры
        if ($_SESSION['gameDifficulty']=='easy') {
           while ($numer) {
               $kn=rand(1,9);
               if ($_SESSION['pole'.$kn]=='') $numer=false;
           }
        }  else {
            while ($numer) {
                $kn=rand(1,9);
                if ($_SESSION['pole'.$kn]=='') $numer=false;
            }
        }
        return $kn;
    }

    // служебная функция, проверяет есть ли свободная горизонталь-вертикаль
    // используется для того, чтобы работать с центром своим и отрабатывать вертикали или горизонтали
    function horizonVertical()
    {
        if ($_SESSION['pole2']=='' && $_SESSION['pole8']=='') return true;
        if ($_SESSION['pole4']=='' && $_SESSION['pole6']=='') return true;
        return false;
    }
    // Функция анализирует расположение камней и проверяет выиграл ли игрок
    // Последний ход берется после нажатия кнопки, до прорисовки нажатия кнопки
    function playerWon($klac, $x_o='X')
    {
       // проверка горизонтальных рядов
       if ($klac==1 || $klac==4 || $klac==7)
           if ($_SESSION['pole'.$klac+1]==$x_o && $_SESSION['pole'.$klac+2]==$x_o)
               return true;
       if ($klac==2 || $klac==5 || $klac==8)
           if ($_SESSION['pole'.$klac-1]==$x_o && $_SESSION['pole'.$klac+1]==$x_o)
               return true;
       if ($klac==3 || $klac==6 || $klac==9)
           if ($_SESSION['pole'.$klac-1]==$x_o && $_SESSION['pole'.$klac-2]==$x_o)
               return true;
        ////////////////////////////////////////////////////////////////////////
       // проверка вертикальных рядов
       if ($klac==1 || $klac==2 || $klac==3)
           if ($_SESSION['pole'.$klac+3]==$x_o && $_SESSION['pole'.$klac+6]==$x_o)
               return true;
       if ($klac==4 || $klac==5 || $klac==6)
           if ($_SESSION['pole'.$klac-3]==$x_o && $_SESSION['pole'.$klac+3]==$x_o)
               return true;
       if ($klac==7 || $klac==8 || $klac==9)
           if ($_SESSION['pole'.$klac-3]==$x_o && $_SESSION['pole'.$klac-6]==$x_o)
               return true;
        ////////////////////////////////////////////////////////////////////////
       // проверка диагоналей
       if ($klac==1)
           if ($_SESSION['pole'.$klac+4]==$x_o && $_SESSION['pole'.$klac+8]==$x_o)
               return true;
       if ($klac==3)
           if ($_SESSION['pole'.$klac+2]==$x_o && $_SESSION['pole'.$klac+4]==$x_o)
               return true;
       if ($klac==7)
           if ($_SESSION['pole'.$klac-2]==$x_o && $_SESSION['pole'.$klac-4]==$x_o)
               return true;
       if ($klac==9)
           if ($_SESSION['pole'.$klac-4]==$x_o && $_SESSION['pole'.$klac-8]==$x_o)
               return true;
        ////////////////////////////////////////////////////////////////////////
       // проверка 5-ки, середины поля
       if ($klac==5) {
           if ($_SESSION['pole'.$klac-4]==$x_o && $_SESSION['pole'.$klac+4]==$x_o)
               return true;
           if ($_SESSION['pole'.$klac-2]==$x_o && $_SESSION['pole'.$klac+2]==$x_o)
               return true;
       }
        ////////////////////////////////////////////////////////////////////////
       return false;
    }
    // Функция определяет закончилась ли игра.
    function gamesPlayed()
    {
        if ($_SESSION['pole1']==$_SESSION['x_o'] && $_SESSION['pole2']==$_SESSION['x_o'] && $_SESSION['pole3']==$_SESSION['x_o']) return true;
        if ($_SESSION['pole4']==$_SESSION['x_o'] && $_SESSION['pole5']==$_SESSION['x_o'] && $_SESSION['pole6']==$_SESSION['x_o']) return true;
        if ($_SESSION['pole7']==$_SESSION['x_o'] && $_SESSION['pole8']==$_SESSION['x_o'] && $_SESSION['pole9']==$_SESSION['x_o']) return true;
        if ($_SESSION['pole1']==$_SESSION['x_o'] && $_SESSION['pole4']==$_SESSION['x_o'] && $_SESSION['pole7']==$_SESSION['x_o']) return true;
        if ($_SESSION['pole2']==$_SESSION['x_o'] && $_SESSION['pole5']==$_SESSION['x_o'] && $_SESSION['pole8']==$_SESSION['x_o']) return true;
        if ($_SESSION['pole3']==$_SESSION['x_o'] && $_SESSION['pole6']==$_SESSION['x_o'] && $_SESSION['pole9']==$_SESSION['x_o']) return true;
        if ($_SESSION['pole1']==$_SESSION['x_o'] && $_SESSION['pole5']==$_SESSION['x_o'] && $_SESSION['pole9']==$_SESSION['x_o']) return true;
        if ($_SESSION['pole3']==$_SESSION['x_o'] && $_SESSION['pole5']==$_SESSION['x_o'] && $_SESSION['pole7']==$_SESSION['x_o']) return true;
        return false;
    }
    // Функция определяет закончилась ли игра.
    function gamesComputer()
        {
            $x_o='';
            if ($_SESSION['x_o']=='X') $x_o='O';
            if ($_SESSION['x_o']=='O') $x_o='X';

            if ($_SESSION['pole1']==$x_o && $_SESSION['pole2']==$x_o && $_SESSION['pole3']==$x_o) return true;
            if ($_SESSION['pole4']==$x_o && $_SESSION['pole5']==$x_o && $_SESSION['pole6']==$x_o) return true;
            if ($_SESSION['pole7']==$x_o && $_SESSION['pole8']==$x_o && $_SESSION['pole9']==$x_o) return true;
            if ($_SESSION['pole1']==$x_o && $_SESSION['pole4']==$x_o && $_SESSION['pole7']==$x_o) return true;
            if ($_SESSION['pole2']==$x_o && $_SESSION['pole5']==$x_o && $_SESSION['pole8']==$x_o) return true;
            if ($_SESSION['pole3']==$x_o && $_SESSION['pole6']==$x_o && $_SESSION['pole9']==$x_o) return true;
            if ($_SESSION['pole1']==$x_o && $_SESSION['pole5']==$x_o && $_SESSION['pole9']==$x_o) return true;
            if ($_SESSION['pole3']==$x_o && $_SESSION['pole5']==$x_o && $_SESSION['pole7']==$x_o) return true;
            return false;
        }

    // проверить не закончились ли пустые места на поле.
    // функция провряет не наступила ли ничья
    function drawСheck()
    {
        for ($i=1; $i<10; $i++) {
            if ($_SESSION['pole'.$i]=='') {
                return false;
            }
        }
        return true;
    }
   
}





