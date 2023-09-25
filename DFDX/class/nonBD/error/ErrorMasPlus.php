<?php
namespace class\nonBD\error;

/**
 * Класс наследует другой класс ErrorMas для того
 * чтобы к тому функционалу добавить метод, возвращающий
 * информацию о том, были ли переданы в класс ErrorMas
 * екземпляры с ошибками.
 * Так как данная информация не во всех случаях нужна,
 * то создан дополнительный класс для этого 
 */

 class ErrorMasPlus extends ErrorMas
 {
    public function searchError()
    {
        if (count($this->in->getMassError())==0) {
            return true;
        }
        return false;
    }
 }
