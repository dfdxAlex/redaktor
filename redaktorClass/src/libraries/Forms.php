<?php
namespace src\libraries;

/**
 * Класс ставит различные формы, в зависимости от условий.
 * Шаблон Простая Фабрика.
 */

 class Forms
 {
    /**фабрика объектов */
    public static function formsFactory($in)
    {
        return match (true) {
          $_GET['level']=='1' => new InputClassName($in),
            default => '',
        };
    }

        /**фабрика объектов данных*/
    public static function masFactory($in)
        {
            return match (true) {
              isset($_POST['nameAll']) => new forms\levelone\VMCAll,
              isset($_POST['nameMy']) => new forms\levelone\VMUser(new forms\levelone\VMCAll),
              isset($_POST['nameAllInterface']) => new forms\levelone\VMI,
              isset($_POST['nameMyInterface']) => new forms\levelone\VMUser(new forms\levelone\VMI),
              isset($_POST['nameAllTrait']) => new forms\levelone\VMT,
              isset($_POST['nameMyTrait']) => new forms\levelone\VMUser(new forms\levelone\VMT),
                default => new forms\levelone\VMCAll,
            };
        }
 }
 

 /**
  * класс выводит содержимое на экран
  */
 class InputClassName extends PostFromInputClassName
 {
     private $translateThis;
     /**  Содержит массив с классами, трейтами или интерфейсами.
      *   Объявлен здесь для того, чтобы к нему был доступ из-за
      *   пределов класса
     */
     private $mas = [];

     public function getMas() 
     {
         /**
          * Функция возвращает любой элемент массива
          * который используется для определения того, с чем работаем.
          * классы, интерфейсы или трейты
          */
         foreach($this->mas as $value) {
             return $value;
         }

         return false;
     }

     public function getTranslator()
     {
      return $this->translateThis;
     }

     public function __construct($in)
     {
         $this->translateThis=$in;
         parent::__construct();

         // Создать объект и получить нужный массив
         $linkObj = Forms::masFactory(true);
         $this->mas = $linkObj->VMC();

         //создает объект для предварительного вывода информации
         $this->selectP = new TestObj($this);
     }

     public function __toString()
     {
       
        /**перевод для кнопки Выбрать */
        $sub2 = $this->translateThis->translator('Выбрать');



        /**Запоминает выбранное имя класса */
        // $this->ram->setPrefix('classUpdate_');
        // $selectP = $this->ram->getRam('level_1_class_name');
        
        echo $this->selectP;

        $select = "<div class='select-div'> <select 
                      name='input-class-name--select'
                    >";

                    foreach ($this->mas as $value) {
                    $select.="<option
                                value=$value
                                class='input-class-name--options'
                              >
                                $value
                              </option>
                             ";
                    }
                      
                    $select.="</select>
                              <input 
                                type='submit'
                                name='input-class-name'
                                value='$sub2'
                                class='buttom-level-one buttom-level-one--select'
                              >
                              </div>
                            ";
        $sub3 = $this->translateThis->translator('Показать только классы пользователя ');
        $sub1 = $this->translateThis->translator('Показать все классы');
        $sub4 = $this->translateThis->translator('Показать все интерфейсы');
        $sub5 = $this->translateThis->translator('Показать интерфейсы пользователя');
        $sub6 = $this->translateThis->translator('Показать все трейты');
        $sub7 = $this->translateThis->translator('Показать пользовательские трейты');
        
        return "
                 <section class='form-InputClassName'>
                   <form
                     method='post'
                   >
                     <input 
                       type='submit'
                       name='nameAll'
                       value='$sub1'
                       class='buttom-level-one'
                     >
                     <input 
                      type='submit'
                      name='nameMy'
                      value='$sub3'
                      class='buttom-level-one'
                     >
                     <input 
                     type='submit'
                     name='nameAllInterface'
                     value='$sub4'
                     class='buttom-level-one'
                     >
                     <input 
                      type='submit'
                      name='nameMyInterface'
                      value='$sub5'
                      class='buttom-level-one'
                     >
                     <input 
                     type='submit'
                     name='nameAllTrait'
                     value='$sub6'
                     class='buttom-level-one'
                     >
                     <input 
                      type='submit'
                      name='nameMyTrait'
                      value='$sub7'
                      class='buttom-level-one'
                     >
                     $select
                   </form>
                 </section>
        ";
     }
 }

 /**
  * класс запоминает выбор пользователя
  */
 class PostFromInputClassName
 {
     protected $ram = null;
     public function __construct()
     {
          $this->ram = \src\libraries\RamSession::ramSession();
          if (isset($_POST['input-class-name']) && isset($_POST['input-class-name--select']))
          $this->ram->setPrefix('classUpdate_')
                    ->setRam('level_1_class_name',$_POST['input-class-name--select']);
     } 
     public function getRamLink()
     {
      return $this->ram;
     } 
 }

/**
 * Класс выводит дополнительную информацию, краткую,
 * о выбранном классе.
 */
class TestObj extends PostFromInputClassName
{
    //принимает ссылку на объект InputClassName
    private $linkFromInputClassName;
    private $translate;
    use ooo;
    public function __construct($in)
    {
        $this->linkFromInputClassName = $in;
        parent::__construct();
        $this->translate = $this->linkFromInputClassName->getTranslator();
    }
    public function __toString()
    {    
        $elementMas = $this->ram->setPrefix('classUpdate_')
                    ->getRam('level_1_class_name');

        /**
         * Проверяем, что выбрано, для правильного написания заголовка
         */
        $ob='';       
        if ($elementMas!='') {
            /**
            * Создать объект для исследования
            */
            $obj = new \ReflectionClass($elementMas);
            
            $nsp = $obj->getNamespaceName();
            if ($nsp == '') $nsp='\\';
            $nameClass = $obj->getName();
            $shortName = $obj->getShortName();
            $parentClass = '--';
            $sub5 = $this->translate->translator('Родительский класс');
            $sub6 = $this->translate->translator('Имена интерфейсов');

            $namesInterfaces = $obj->getInterfaceNames ();
            $namesInterfaces = implode(',',$namesInterfaces);

            $sub7 = $this->translate->translator('Имена трейтов');
            $namesTraits = $obj->getTraitNames();
            $namesTraits = implode(',',$namesTraits);
            
            $sub8 = $this->translate->translator('Хранится в файле');
            $namesFile = $obj->getFileName();

            if ($obj->isInterface()) {
                $sub1 = $this->translate->translator('Краткая информация по интерфейсу');
                $sub2 = $this->translate->translator('Имя интерфейса');
                $sub4 = $this->translate->translator('Короткое имя интерфейса');
                $namesInterfaces='--';
                $namesTraits='--';
            }
            else if ($obj->isTrait()) {
                $sub1 = $this->translate->translator('Краткая информация по трейту ');
                $sub2 = $this->translate->translator('Имя трейта');
                $sub4 = $this->translate->translator('Короткое имя трейта');
                $namesInterfaces='--';
                $namesTraits='--';
            }
            else {
                $sub1 = $this->translate->translator('Краткая информация по классу ');
                $sub2 = $this->translate->translator('Имя класса');
                $sub4 = $this->translate->translator('Короткое имя класса');
                $parentClass = $obj->getParentClass();
                if ($parentClass !== false) $parentClass = $parentClass->getName();
            }
        }
        else {
          $sub1 = $this->translate->translator('Елемент не выбран');
          $sub2 = $this->translate->translator('Имя класса');
          $nameClass='';
          $nsp='';
        }
        
        $sub3 = $this->translate->translator('Пространство имён');
        
        return "<section class='test-obj--to-string'>
                  <h2>$sub1</h2>
                  <p>$sub2: $nameClass</p>
                  <p>$sub3: $nsp</p>
                  <p>$sub4: $shortName</p>
                  <p>$sub5: $parentClass</p>
                  <p>$sub6: $namesInterfaces</p>
                  <p>$sub7: $namesTraits</p>
                  <p>$sub8: $namesFile</p>
                </section>
               ";
    }
}

trait ooo
{

}







