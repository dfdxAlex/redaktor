<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceFoUser
{
    public function statusNumerSlovo($status)
    {
     switch ($status) {
       case 0:
         return 'Гость';
       case 1:
         return 'Пользователь';
       case 2:
         return 'Редактор';
       case 3:
         return 'Подписчик';
       case 4:
         return 'Администратор';
       case 5:
         return 'Супер Администратор';
       case 9:
         return 'Не подтвердивший регистрацию';
       default:
         return 'Статус не известен';
     }
    }
}
