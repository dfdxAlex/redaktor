<?php
namespace extensions\resource\imagesmapa\object;

class MenuUp implements \class\nonBD\interface\InterfaceButton
{
    use \class\redaktor\interface\trait\TraitInterfaceButton; 
    
    public function __construct()
    {
        $toSession = new \class\value_object\toSession();
        $toSessionLocal = new \extensions\resource\imagesmapa\valueObject\toSessionLocal();
        $classWorkToType = new \class\nonBD\WorkToType(); // удалить
        // обрабатываем режим или шаг
        // при нажатии кнопок формируется соответствующий щаг вперед или назад
        // Блок рисования кнопок рисует соответствующие данному шагу кнопки
        if (isset($_POST['imagesMapaMenuUp'])) {
            if ($_POST['imagesMapaMenuUp']=='На главную') $_SESSION['imagesMapaMenuUp']=0;
            if ($_POST['imagesMapaMenuUp']=='Вернуться') $_SESSION['imagesMapaMenuUp']--;
            if ($_POST['imagesMapaMenuUp']=='Загрузить картинку') $_SESSION['imagesMapaMenuUp']=1;
            if ($_POST['imagesMapaMenuUp']=='Загрузить') $_SESSION['imagesMapaMenuUp']=2;
            if ($_POST['imagesMapaMenuUp']=='Изменить') {
                if ($_POST['imageWidth']!='') $_SESSION['imagesMapaWightTmp']=$_POST['imageWidth'];
                if ($_POST['imageHeight']!='') $_SESSION['imagesMapaHeightTmp']=$_POST['imageHeight'];
            }
            if ($_POST['imagesMapaMenuUp']=='Очистить') {
                $_SESSION['imagesMapaWightTmp']='';
                $_SESSION['imagesMapaHeightTmp']='';
            }
            if ($_POST['imagesMapaMenuUp']=='Очистить точки') {
                $toSession->killSessionFilter('klac');
            }
            if ($_POST['imagesMapaMenuUp']=='Очистить дубли') {
                $toSessionLocal->killDubli();
            }
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

        // данный блок выводит кнопки для загрузки изображения
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
                             'text2',
                             'imageWidth',
                             'Ширина',
                             'text2',
                             'imageHeight',
                             'Высота',
                             'submit',
                             'imagesMapaMenuUp',
                             'Изменить',
                             'submit',
                             'imagesMapaMenuUp',
                             'Очистить',
                             'submit',
                             'imagesMapaMenuUp',
                             'Очистить точки',
                             'submit',
                             'imagesMapaMenuUp',
                             'Очистить дубли',
                             'submit',
                             'imagesMapaMenuUp',
                             'HTML',
                             'submit',
                             'imagesMapaMenuUp',
                             'PHP',
                            );
            if (isset($_POST['imagesMapaMenuUp']) && $_POST['imagesMapaMenuUp']=='Загрузить') {
                $fileimage=file_get_contents($_FILES['imagesFiles']['tmp_name']);
                $_SESSION['imagesMapaPathImageTmp']='resource/imagesmapa/tmp/'.$_FILES['imagesFiles']['name'];
                file_put_contents($_SESSION['imagesMapaPathImageTmp'],$fileimage);
            }

            if (isset($_POST['image_x'])) {
                $i=$toSessionLocal->klacNumerEnd();
                $_SESSION['klacX'.$i]=$_POST['image_x'];
                $_SESSION['klacY'.$i]=$_POST['image_y'];
               
            }

            $poleTwo='';
            if ((isset($_POST['imagesMapaMenuUp']) && $_POST['imagesMapaMenuUp']=='Очистить дубли') || isset($_POST['image_x'])) {
                $poleTwo=$toSession->getSessionAllFilterReturn("klac");
            }

            if ((isset($_POST['imagesMapaMenuUp']) && $_POST['imagesMapaMenuUp']=='HTML'))
                $poleTwo=$this->kodHTML($toSessionLocal->sessionToMas());

            // исходная строка с кнопкой-картинкой без высоты и ширины
            $imageButton='<input type="image" name="image" class="imagesMapaImageButton-button" src="'.$_SESSION['imagesMapaPathImageTmp'].'">';

            // проверяем переменные сессий, которые могут содержать высоту и ширину картинки
            // если такие переменные есть, то вставляем соответствующий параметр в строку
            if ($_SESSION['imagesMapaWightTmp']!='')
                $imageButton=preg_replace('/input\s/','input width="'.$_SESSION['imagesMapaWightTmp'].'px" ',$imageButton);
            if ($_SESSION['imagesMapaHeightTmp']!='')
                $imageButton=preg_replace('/input\s/','input height="'.$_SESSION['imagesMapaHeightTmp'].'px" ',$imageButton);
            
           

            // рисуем картинку-кнопку и справа от неё список координат
            echo '<div class="imagesMapaImageButton-div">
                      <form action"#" method="post">
                          <section class="container-fluid">
                              <div class="row">
                                  <div class="col-12">
                                      '.$imageButton.'
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-12">
                                      <div class="imagesMapaImageButton-div-klac">'
                                          .$poleTwo.'
                                      </div>
                                  </div>
                              </div>
                          </section>
                      </form>
                 </div>
            ';
           //$classWorkToType->printMas($toSessionLocal->sessionToMas()); 
        }
    }

    //Функция создает код для вставки в документ html 
    public function kodHTML($mas)
    {
        $cords='';
        for ($i=0; $i<count($mas[0]); $i++) {
            if ($i>0)
                $cords=$cords.','.$mas[0][$i].','.$mas[1][$i];
            else 
                $cords=$mas[0][$i].','.$mas[1][$i];
        }
        $width='';
        if ($_SESSION['imagesMapaWightTmp']!='') {
            $width='width="'.$_SESSION['imagesMapaWightTmp'].'px" ';
        }
        $height='';
        if ($_SESSION['imagesMapaHeightTmp']!='') {
            $height='height="'.$_SESSION['imagesMapaHeightTmp'].'px" ';
        }
        $rez='&#060;img src="'.$_SESSION['imagesMapaPathImageTmp'].'" '.$width.$height.' alt="CMS-DFDX" usemap="#workmap"&#062;<br><br>';
        $rez.='&#060;map name="workmap"&#062;<br>';
        $rez.='&#060;area shape="poly" href="http://www.google.com" coords="'.$cords.'" &#062;<br>';
        $rez.='&#060;/map&#062;';
        return $rez;
    }
}
