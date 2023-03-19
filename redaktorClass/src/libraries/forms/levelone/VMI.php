<?php
namespace src\libraries\forms\levelone;

/**сласс возвращает все интерфейсы */
class VMI implements IVMC
{
  public function VMC()
  {
       return get_declared_interfaces();
  }
}
