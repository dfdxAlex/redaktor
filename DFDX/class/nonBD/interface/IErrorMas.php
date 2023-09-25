<?php
namespace class\nonBD\interface;

interface IErrorMas
{
    /**
     * Все классы, которые принимают объекты с интерфейсом
     * IErrorMas работают с методом getMassError(), поэтому
     * он должен быть имплементирован в любой класс, имплементи-
     * рующий данный интерфейс
     * метод описан в трейте use \class\nonBD\error\TraitForError; 
     */
    public function getMassError();
    /**
     * Данный метод добавляет очередную ошибку в массив
     * который впоследствии будет обрабатываться классом
     * ErrorMas
     * метод описан в трейте use \class\nonBD\error\TraitForError; 
     */
    public function addError($error);
}
