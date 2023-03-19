<?php
namespace src\libraries\forms\levelone;

  /**класс принимает массив подключенных классов
   * трейтов или интерфейсов и очищает их от системных
  */
  class VMUser
  {
      private $imvc;

      public function __construct(IVMC $in)
      {
          $this->imvc = $in;
      }

      public function VMC()
      {
          $masSelect = $this->imvc->VMC();
          foreach ($masSelect as $key=>$value) {
            $userclass = new \ReflectionClass($value);
            if (!$userclass->isUserDefined())
                unset($masSelect[$key]);
          }
          return $masSelect;
      }
  }
