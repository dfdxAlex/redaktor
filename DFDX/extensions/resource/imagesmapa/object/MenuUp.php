<?php
namespace extensions\resource\imagesmapa\object;

class MenuUp implements \class\nonBD\interface\InterfaceButton
{
    use \class\redaktor\interface\trait\TraitInterfaceButton; 

    public function __construct()
    {
        $classWorkToType = new \class\nonBD\WorkToType(); // удалить
        // обрабатываем режим или шаг
        // при нажатии кнопок формируется соответствующий щаг вперед или назад
        // Блок рисования кнопок рисует соответствующие данному шагу кнопки
        if (isset($_POST['imagesMapaMenuUp'])) {
            if ($_POST['imagesMapaMenuUp']=='На главную') $_SESSION['imagesMapaMenuUp']=0;
            if ($_POST['imagesMapaMenuUp']=='Вернуться') $_SESSION['imagesMapaMenuUp']--;
            if ($_POST['imagesMapaMenuUp']=='Загрузить картинку') $_SESSION['imagesMapaMenuUp']=1;
            if ($_POST['imagesMapaMenuUp']=='Загрузить') $_SESSION['imagesMapaMenuUp']=2;
        }

        // рисуем кнопки
        // Блок рисует кнопки согласно текущему шагу, сформированному блоком формирования шагов.
        if ($_SESSION['imagesMapaMenuUp']<1)
            $this->formBlock('imagesMapaMenuUp', '#', 'btn_start',
                             'submit',
                             'imagesMapaMenuUp',
                             'На главную',
                             'submit',
                             'imagesMapaMenuUp',
                             'Загрузить картинку',
                            );

        if ($_SESSION['imagesMapaMenuUp']==1) {
            echo '<section class="container-fluid">
                      <div class="row">
                          <div class="col-12">
                              <div class="form-group imagesMapaLoadFiles">
                                  <form action="#" method="post" enctype="multipart/form-data">
                                      <label for="exampleFormControlFile1" class="imagesMapaLoadFiles-label btn">Выбрать файл</label>
                                      <input type="file" name="imagesFiles" accept="image/*" id="exampleFormControlFile1" style="display:none;">
                                      <input type="submit" value="Загрузить" name="imagesMapaMenuUp" class="imagesMapaLoadFiles-button btn">
                                      <input type="submit" value="Вернуться" name="imagesMapaMenuUp" class="imagesMapaLoadFiles-button btn">
                                      <input type="submit" value="На главную" name="imagesMapaMenuUp" class="imagesMapaLoadFiles-button btn">
                                  </form>
                              </div>
                          </div>
                      </div>
                  </section>';
        }

        if ($_SESSION['imagesMapaMenuUp']==2) {
            $this->formBlock('imagesMapaMenuUp', '#', 'btn_start',
                             'submit',
                             'imagesMapaMenuUp',
                             'На главную',
                             'submit',
                             'imagesMapaMenuUp',
                             'Вернуться',
                            );
            $classWorkToType->printMas($_FILES);
            $fileimage=file_get_contents($_FILES['imagesFiles']['tmp_name']);
            $pathName='resource/imagesmapa/tmp/'.$_FILES['imagesFiles']['name'];
            echo $pathName;
            file_put_contents($pathName,$fileimage);
            //[imagesFiles][tmp_name]
            echo '<div class="imagesMapaImageButton">
                      <form action"#" method="post">
                          <input type="image" name="image" src="'.$pathName.'">
                      </form>
                 </div>
            ';
        }
    }
}
