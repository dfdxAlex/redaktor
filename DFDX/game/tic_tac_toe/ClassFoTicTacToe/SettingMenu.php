<?php
namespace game\tic_tac_toe\ClassFoTicTacToe;

// класс рисует меню выбора настроек игры
class SettingMenu
{
    public function __construct()
    {
        if (!isset($_SESSION['blockBigMenu']) || $_SESSION['blockBigMenu']==false) {
            // Форма начальных настроек игры
             echo '<section class="container-fluid">';
             echo '<form action="tic_tac_toe.php" method="post">
                   <div class="row">
                   <div class="col-12">';
             //выбрать чем играть, крестиками или ноликами
             echo '<select name="x_o">';
             echo '<optgroup label="Играть крестиками или ноликами? (Play with tic or tac toe?)">';
               echo '<option>Играю крестиками (I play with crosses)</option>';
               echo '<option>Играю ноликами (I play with zeros)</option>';
             echo '</optgroup>';
             echo '</select>';
             echo '</div></div>
                   <div class="row">
                   <div class="col-12">';
             //выбрать кто ходит первый
             echo '<select name="firstMove">';
             echo '<optgroup label="Кто ходит первым? (Who goes first?)">';
               echo '<option>Я хожу первым (I go first)</option>';
               echo '<option>Компьютер ходит первым (Computer goes first)</option>';
             echo '</optgroup>';
             echo '</select>';
             echo '</div></div>
                   <div class="row">
                   <div class="col-12">';
             //выбрать сложность игры     
             echo '<select name="gameDifficulty">';
             echo '<optgroup label="Выбрать сложность игры (Select game difficulty)">';
               echo '<option>Простая игра (Simple game)</option>';
               echo '<option>Сложная игра (Difficult game)</option>';
             echo '</optgroup>';
             echo '</select>';
             echo '</div></div>
                  <div class="row">
                  <div class="col-12">';
             echo '<input type="submit" name="Go" value="Go">';
             echo '</div></div>';
             echo '</form></section>';
            } else {
                echo '<section class="container-fluid">
                      <form action="tic_tac_toe.php" method="post">
                      <div class="row">
                      <div class="col-12">
                      <input type="submit" name="Reset" value="Reset">
                      </div></div>
                      </section>
                      ';
            }
             
    }
}
