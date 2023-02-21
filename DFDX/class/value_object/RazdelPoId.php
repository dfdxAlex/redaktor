<?php
namespace class\value_object;

class RazdelPoId implements \class\redaktor\interface\interface\InterfaceWorkToBd
{
    use \class\redaktor\interface\trait\TraitInterfaceWorkToType;
    use \class\redaktor\interface\trait\TraitInterfaceDebug;
    // use \class\redaktor\interface\trait\TraitInterfaceWorkToFiles;
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;

    // класс вытягивает из базы данных раздел статьи по ID
    // klasa pobiera sekcję artykułu z bazy danych według ID
    // the class pulls the article section from the database by ID
    protected $rezult;

    public function __construct($id)
    {
        $this->rezult='non-path';
        $this->connectToBd();
        $this->tableValidationCMS();

        $rez=$this->zaprosSQL("SELECT razdel FROM bd2 WHERE id=".$id);
        if ($this->notFalseAndNULL($rez)) $stroka=mysqli_fetch_array($rez);
        if ($this->notFalseAndNULL($stroka) && $stroka[0]!='-') $this->rezult=$stroka[0];
    }

    public function __toString()
    {
        return $this->rezult;
    }
}
