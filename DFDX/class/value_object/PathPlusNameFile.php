<?php
namespace class\value_object;

class PathPlusNameFile
{
    protected $rezult;

    public function __construct($razdel,$nameFile)
    {
        $fileName=$razdel.'/'.$nameFile.'.php';       // имя файла с каталогом
        if (!is_null(preg_filter('/-\./','.',$fileName))) 
           $fileName=preg_filter('/-\./','.',$fileName);
        if (!is_null(preg_filter('/\/-/','/',$fileName))) 
           $fileName=preg_filter('/\/-/','/',$fileName);
        $this->rezult=$fileName;
    }

    public function __toString()
    {
        return $this->rezult;
    }
}
