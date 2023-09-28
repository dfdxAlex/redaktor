<?php
namespace src\php;

use \class\nonBD\HtmlFutter;
use \class\js\connectFunctionJs\ConnectObjRunConstruct;

class FutterFacade
{
    public function __construct()
    {
        $stringConnectBootstrap = new HtmlFutter();

        $newStringConnect = str_replace('</body>','',$stringConnectBootstrap);
        
        // $linkForFileJs = new ConnectLibraryJs([
        //     '../src/js/MyLib.js'
        // ]);
        $linkForFileJs="";

        new ConnectObjRunConstruct(['src/js/isValid/ClassIsValidFontSize']);

        echo $linkForFileJs.$stringConnectBootstrap.'</body>';
    }
}
