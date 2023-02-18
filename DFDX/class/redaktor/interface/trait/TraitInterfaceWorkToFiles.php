<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToFiles
{
    public function searcNamePath($nameFile)
    {
      while (!file_exists($nameFile))
        $nameFile='../'.$nameFile;
      return $nameFile;
    }
}
