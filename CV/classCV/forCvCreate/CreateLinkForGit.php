<?php
namespace classCV\forCvCreate;

use \class\nonBD\Translation;

class CreateLinkForGit
{
    public function __construct(&$mas)
    {
        $mas = $this->git();
    }

    private function git()
    {
        if ($_SESSION['git']!='') {
            $git='GIT';
            $git_text="<a href='".$_SESSION['git']."' target='_blank'>".$_SESSION['git']."</a>";
            return [$git, $git_text];
        } 
        return ['', ''];
    }
}
