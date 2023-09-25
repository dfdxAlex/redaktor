<?php
namespace class\nonBD\error;

/**
 * трейт содержит в себе массив для работы с ошибками 
 * и методы, для добавления и извлечения ошибок из
 * массива.
 * Для работы класса ErrorMas данный трейт должен 
 * быть подключен ко всем классам, которые имплементируют
 * интерфейс IErrorMas
 */

 trait TraitForError
 {
    private $masError = [];
    
    public function getMassError()
    {
        return $this->masError;
    }
    public function addError($error)
    {
        $this->masError[] = $error;
    }
 }
