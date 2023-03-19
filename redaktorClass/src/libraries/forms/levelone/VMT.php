<?php
namespace src\libraries\forms\levelone;


/**сласс возвращает все трейты */
class VMT implements IVMC
{
  public function VMC()
  {
       return get_declared_traits();
  }
}
