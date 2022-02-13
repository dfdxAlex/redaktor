<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToHeader
{
    public function topMenuProcessing()
    {
        echo '<div class="col-xl-8 col-lg-8 col-md-9 col-sm-12 col-12">';
        if ($_SESSION["status"]>99) $_SESSION["status"]=9;
        $this->__unserialize(array('menu9','menu_up_dfdx',$this->searcNamePath('dfdx.php'),'Логин','Пароль'));
        echo '</div>';

    }

    public function showSiteSection(string $pathFileSection, string $functionAnalogSectionImages)
    {
         // Раздел сайта показать
         echo '<section class="container-fluid">
               <div class="row">
               <div class="col-12">
               <div class="logoHtml">';
        
        if (stripos($_SERVER['REQUEST_URI'],'news')===false) { 
            $alt=preg_replace('/\..+/','',$pathFileSection);
            $alt=preg_replace('/image\//','',$alt);
            if (file_exists($pathFileSection)) 
                echo '<img src="'.$pathFileSection.'" alt="'.$alt.'">';
            else $functionAnalogSectionImages();
        }
        // Блок работает тогда, когда данный файл вызывается из персональных ссылок для статей
        if (stripos($_SERVER['REQUEST_URI'],'news')!==false) {
            $pathMas=preg_split('/news/',$_SERVER['REQUEST_URI']);
            $pathFile='news'.$pathMas[1];
            $zapros="SELECT bd2.name FROM bd2, url_po_id_bd2 WHERE bd2.id=url_po_id_bd2.id AND url_po_id_bd2.url='".$pathFile."'";
            $rez=$this->zaprosSQL($zapros);
            if ($this->notFalseAndNULL($rez)) {
                $stroka=mysqli_fetch_array($rez);
                zagolowkaBeg($stroka[0]);
            }
        }
        echo '<hr>
              </div>
              </div>
              </div>
              </section>';
    }

    public function headStart($title)
    {
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<link rel="shortcut icon" href="image/favicon2.ico" type="image/x-icon">';
        echo $title;
        echo '<meta name="Cache-Control" content="no-store">';
    }

    public function headBootStrap5(array $listFileStyle)
    {
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">';
        
        foreach($listFileStyle as $value)
            echo '<link rel="stylesheet" href="'.$value.'"> ';
    }

}
