<?php
namespace classCV;


// класс ввода фотографии
class LoadFoto
{
    public function __construct()
    {
        if (!isset($_SESSION['linkFoto'])) $_SESSION['linkFoto']='';
        $this->formLoad();

    }

    function formLoad()
    {
        //echo $_FILES['file']['tmp_name'];
        if (isset($_FILES['file']['tmp_name']) && !is_null($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name']!='') {
            $f=file_get_contents($_FILES['file']['tmp_name']);
            $name=$_FILES['file']['name'];
            $path="images_user/";
            $fullPath=$path.$name;
            $i=0;
            while(file_exists($fullPath)) {
               $i++;
               $fullPath=$path.'images_'.$i.$name;
            }
            file_put_contents($fullPath,$f);
            $_SESSION['linkFoto']=$fullPath;
        }

        if ($_SESSION['linkFoto']!='') 
            $linkFoto=$_SESSION['linkFoto'];

        echo '
        <script src="js/MyLib.js"></script>

        <div class="load-foto-form">
            <section class="container-fluid">
                <div class="row">
                    <p class="mesage-load-foto">'. (string) new \class\nonBD\Translation("Ссылка на картинку").'</p>
                </div>
                <div class="row">
                <p class="mesage-load-foto"> '.$_SESSION['linkFoto'].' </p>
                </div>
                <div class="row">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="col-8">
                    <div class="field__wrapper">
                    <input name="file" type="file" name="file" id="field__file-2" class="field field__file" multiple>
                    <label class="field__file-wrapper" for="field__file-2">
                      <div class="field__file-fake">'. (string) new \class\nonBD\Translation("Выбрать фотографию").'</div>
                      <div class="field__file-button">'. (string) new \class\nonBD\Translation("Выбрать").'</div>
                    </label>
                    </div>
                    </div>
                    <div class="col-4 pole-boot-col-foto-CV">
                        <input type="submit" name="load_foto" value="'. (string) new \class\nonBD\Translation("Отправить").'" class="btn btn-secondary class-btn pole-text-name-CV">
                    </div>
                </form>
                </div>
            </section>
        </div>



    ';
    }

    public function saveFoto()
    {

    }
}
