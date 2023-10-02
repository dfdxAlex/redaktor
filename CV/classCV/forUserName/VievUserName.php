<?php
namespace classCV\forUserName;

use \class\nonBD\Translation;

// класс Класс принимает имя пользователя
class VievUserName
{
    private $in;

    public function __construct($in)
    {
        $this->in = $in;
    }

    public function vievNameForm()
    {
        return '
            <div class="name-form">
            <form action="#" method="post">
                <section class="container-fluid">
                    '.$this->vievRowOne().'
                    '.$this->vievRowTwo().'
                    '.$this->vievRowThree().'   
                </section>
                </form>
            </div>
        ';
    }

    public function vievRowThree()
    {
        return '
        <div class="row">
            <div class="col-12">
              <input type="submit" name="nameFoCV" value="'.new Translation('Отправить').'" class="btn btn-secondary" >
            </div>
        </div> 
        ';
    }

    public function vievRowTwo()
    {
        return '
        <div class="row">
          <div class="col-3">
            <input type="text" name="name" value="'.$this->in->getName().'">
          </div>
          <div class="col-3">
            <input type="text" name="surname" value="'.$this->in->getSurname().'">
          </div>
          <div class="col-3">
            <input type="text" name="youtube" value="@amatorDed">
          </div>
          <div class="col-3">
          </div>
        </div>
        ';
    }

    public function vievRowOne()
    {
        return '
        <div class="row">
            <div class="col-12">
                <p>'.new Translation('Введите имя и фамилию').'</p> 
            </div>
        </div>';
    }
}
