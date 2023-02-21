<?php
namespace class\value_object;

// класс возвращает имя файла или имя страницы в зависимости от имени статьи
// klasa zwraca nazwę pliku lub nazwę strony w zależności od nazwy artykułu
// class returns filename or pagename depending on article name
class NameFile  implements \class\redaktor\interface\interface\InterfaceWorkToBd
{

    use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
    use \class\redaktor\interface\trait\TraitInterfaceDebug;
    // use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;

    protected $rezult;

    public function __construct($id)
    {
        $this->rezult='';
        $this->connectToBd();
        $this->tableValidationCMS();
        $rez=$this->zaprosSQL("SELECT name FROM bd2 WHERE id=".$id);
        if ($this->notFalseAndNULL($rez)) $stroka=mysqli_fetch_array($rez);
        if ($this->notFalseAndNULL($stroka) && $stroka[0]!='-') $this->rezult=$this->translit($stroka[0]);
    }

    public function __toString()
    {
        return $this->rezult;
    }
}
