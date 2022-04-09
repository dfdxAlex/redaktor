<?php
namespace program\IPCalculator\src\class;

class ClassInterfaceIPCalculator
{
    public function __construct()
    {

    }

    public function interfaceIPCalculator()
    {
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////\\\
        if ($_SESSION['button-IP-Groups']=='z') {
        // интерфейс выбора вычислений айпишников по группам А,B ...
        echo '<div class="interface-ip-calculator-div">
                  <form action="IPCalculator.php" method="post">
                      <p class="IP-Groups-p">Выбрать класс сети</p>
                      <div class="select-IP-Groups-div">
                      <select name="IP_From_Group" class="select-IP-Groups">
                          <option value="a">Класс A</option>
                          <option value="b">Класс B</option>
                          <option value="c">Класс C</option>
                          <option value="d">Класс D</option>
                          <option value="e">Класс E</option>
                      </select>
                      </div>
                      <input class="button-IP-Groups" name="button-IP-Groups" type="submit" value="Показать характеристики">
                  </form>
              </div>';
        } else {
            echo '<div class="interface-ip-calculator-div">
                      <form action="IPCalculator.php" method="post">
                          <input class="button-IP-Groups" name="button-IP-Groups-reset" type="submit" value="Вернуться к выбору">
                      </form>
                  </div>';
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////\\\
    }
}
