<?php
namespace src\php;

use \class\nonBD\HtmlFutter;
use \src\php\loadClassJs\ConnectObjRunConstruct;

class FutterFacade
{
    public function __construct()
    {
        $stringConnectBootstrap = new HtmlFutter();

        $newStringConnect = str_replace('</body>','',$stringConnectBootstrap);
        
        new ConnectObjRunConstruct(['src/js/isValid/ClassIsValidFontSize']);

        echo $stringConnectBootstrap.'</body>';
    }
}
