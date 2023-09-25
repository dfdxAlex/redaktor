<?php
namespace src\php;

use class\nonBD\HtmlFutter;

class FutterDecorator
{
    public function __construct()
    {
        $stringConnectBootstrap = new HtmlFutter();

        $newStringConnect = str_replace('</body>','',$stringConnectBootstrap);
        
        $linkForFileJs = new ConnectLibraryJs([
            '../src/js/MyLib.js'
        ]);

        echo $linkForFileJs.$stringConnectBootstrap.'</body>';
    }
}
