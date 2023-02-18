<?php
namespace classCV;

// класс делает выбор шаблона для CV
class SelectPattern
{
    public function __construct()
    {
        if (!isset($_SESSION['pattern'])) $_SESSION['pattern']=0;
        // отслеживаем нажатие кнопок выбора шаблона
        $this->patternHant();
    }

    public function __toString()
    {
        if ($_SESSION['pattern']==0)
            $mesages = new \class\nonBD\Translation('Выберите шаблон');
        else $mesages = new \class\nonBD\Translation('Выбран шаблон').' :'.$_SESSION['pattern'];


        return '
        <div class="pattern-row-1">
        <p class="mesage-select-pattern">'.$mesages.'</p>
            <div class="container-fluid ">
                <form action="#" method="post">
                <div class="row">
                    <div class="col-4">
                        <div><button name="CV1" class="'.$this->classToImages(1).'"> <img  class="image-pattern" src="images/CV_origin_2.png"> </button></div>
                    </div>
                    <div class="col-4">
                        <button name="CV2" class="'.$this->classToImages(2).'"> <img  class="image-pattern" src="images/CV_origin_1.png"> </button>
                    </div>
                    <div class="col-4">
                        <button name="CV3" class="'.$this->classToImages(3).'"> <img  class="image-pattern" src="images/CV_origin_3.png"> </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        ';
    }

    function patternHant()
    {
        if (isset($_REQUEST['CV1'])) $_SESSION['pattern']=1;
        if (isset($_REQUEST['CV2'])) $_SESSION['pattern']=2;
        if (isset($_REQUEST['CV3'])) $_SESSION['pattern']=3;
    }

    function classToImages($numer)
    {
        if ($_SESSION['pattern']==$numer) return 'image-pattern-button-2';
        return 'image-pattern-button';
    }
    

}



