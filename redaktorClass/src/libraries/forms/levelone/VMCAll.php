<?php
namespace src\libraries\forms\levelone;

 /**класс возвращает массив подключенных классов */
 class VMCAll implements IVMC
 {
  public function VMC()
  {
       return get_declared_classes();
  }
 }
