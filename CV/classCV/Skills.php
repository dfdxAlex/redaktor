<?php
namespace classCV;

// класс хранит информацию об умениях в тексте
class Skills
{
    public function __construct()
    {
        if (!isset($_SESSION['skills'])) $_SESSION['skills']='';
    }

    public function __toString()
    {
        return '
        <section class="container-fluid form-skills">
        <form action="#" method="post">
            <div class="row">
                <div class="col-12">
                    <p> '. (string) new \class\nonBD\Translation('Опишите свои умения').'</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <textarea name="text_area">'.$_SESSION['skills'].'</textarea>
                </div>
            </div>
            <div class="row">
            <div class="col-6">
                <input type="submit" class="btn btn-info" name="skills_button" value="'. (string) new \class\nonBD\Translation('Отправить').'">
            </div>
            </div>
        </form>
        </section>
        ';
    }

    public function skillsHunt()
    {
        if (isset($_REQUEST['skills_button'])) $_SESSION['skills']=$_REQUEST['text_area'];
    }
}
