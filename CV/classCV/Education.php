<?php
namespace classCV;

// класс хранит информацию об образовании
class Education
{
    public function __construct()
    {
        if (!isset($_SESSION['education'])) $_SESSION['education']='';
    }

    public function __toString()
    {
        return '
        <section class="container-fluid form-education">
        <form action="#" method="post">
            <div class="row">
                <div class="col-12">
                    <p> '. (string) new \class\nonBD\Translation('Опишите своё образование').'</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <textarea name="text_area">'.$_SESSION['education'].'</textarea>
                </div>
            </div>
            <div class="row">
            <div class="col-6">
                <input type="submit" class="btn btn-info" name="education_button" value="'. (string) new \class\nonBD\Translation('Отправить').'">
            </div>
            </div>
        </form>
        </section>
        ';
    }

    public function educationHunt()
    {
        if (isset($_REQUEST['education_button'])) $_SESSION['education']=$_REQUEST['text_area'];
    }
}
