<?php
namespace game\tic_tac_toe\ClassFoTicTacToe;

// класс рисует меню выбора настроек игры
// если общее меню ещё не заблокировано, то выводятся пункты выбора настроек игры.
// если была нажата кнопка Go, то большое меню блокируется и выводится только кнопка Reset.
// при нажатии кнопки Reset снова разблокируется меню выбора настроек игры.
// блокировка осуществляется через переменную сессий $_SESSION['blockBigMenu']

// klasa rysuje menu wyboru ustawień gry
// jeśli menu ogólne nie jest jeszcze zablokowane, wyświetlane są opcje wyboru ustawień gry.
// jeśli naciśnięto przycisk Go, duże menu jest blokowane i wyświetlany jest tylko przycisk Reset.
// po naciśnięciu przycisku Reset, menu wyboru ustawień gry zostaje ponownie odblokowane.
// blokowanie odbywa się poprzez zmienną sesji $_SESSION['blockBigMenu']

// class draws a menu for selecting game settings
// if the general menu is not yet blocked, then the options for selecting game settings are displayed.
// if the Go button was pressed, then the large menu is blocked and only the Reset button is displayed.
// when you press the Reset button, the game settings selection menu is unlocked again.
// blocking is done via session variable $_SESSION['blockBigMenu']
class SettingMenu
{
    public function __construct()
    {
        if ($_SESSION['blockBigMenu']==false) {
            // Форма начальных настроек игры
             echo '<section class="container-fluid">';
             echo '<div class="menu-tic-tac-toe">
                   <form action="tic_tac_toe.php" method="post">';

             //выбрать чем играть, крестиками или ноликами
             echo '<div class="row">
                       <div class="col-12">
                           <select name="x_o">
                               <optgroup label="Играть крестиками или ноликами? (Play with tic or tac toe?)">
                                   <option>Играю крестиками (I play with crosses)</option>
                                   <option>Играю ноликами (I play with zeros)</option>
                               </optgroup>
                           </select>
                        </div>
                    </div>';

             //выбрать кто ходит первый
             echo'<div class="row">
                      <div class="col-12"> 
                          <select name="firstMove"> 
                              <optgroup label="Кто ходит первым? (Who goes first?)"> 
                                  <option>Я хожу первым (I go first)</option> 
                                  <option>Компьютер ходит первым (Computer goes first)</option> 
                              </optgroup> 
                          </select> 
                       </div>
                  </div>';
              
              //выбрать сложность игры 
             echo '<div class="row">
                        <div class="col-12">
                            <select name="gameDifficulty">
                                <optgroup label="Выбрать сложность игры (Select game difficulty)">
                                    <option>Простая игра (Simple game)</option>
                                    <option>Сложная игра (Difficult game)</option>
                                    <option>Невозможно выиграть (impossible to win)</option>
                                    <option>Искусственный интеллект (artificial intelligence)</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>';

             echo '<div class="row">
                         <div class="col-12"> 
                             <input type="submit" name="Go" value="Go"> 
                         </div>
                     </div>';

             echo '</form></div></section>';

            } else {
                echo '<section class="container-fluid">
                          <div class="row">
                              <div class="col-12">
                                  <form action="tic_tac_toe.php" method="post">
                                      <input type="submit" name="Reset" value="Reset">
                                  </form>
                              </div>
                          </div>
                      </section>';
            }
    }
}
