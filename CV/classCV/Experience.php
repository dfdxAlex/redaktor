<?php
namespace classCV;

// класс хранит информацию об опыте
class Experience
{
    public function __construct()
    {
        if (!isset($_SESSION['experience'])) $_SESSION['experience']='';
    }

    public function __toString()
    {
        return '
        <section class="container-fluid form-experience">
        <form action="#" method="post">
            <div class="row">
                <div class="col-12">
                    <p> '. (string) new \class\nonBD\Translation('Опишите свой опыт').'</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <textarea name="text_area">'.$_SESSION['experience'].'</textarea>
                </div>
            </div>
            <div class="row">
            <div class="col-6">
                <input type="submit" class="btn btn-info" name="experience_button" value="'. (string) new \class\nonBD\Translation('Отправить').'">
            </div>
            </div>
        </form>
        </section>
        ';
    }

    public function experienceHunt()
    {
        if (isset($_REQUEST['experience_button'])) $_SESSION['experience']=$_REQUEST['text_area'];
    }
}
