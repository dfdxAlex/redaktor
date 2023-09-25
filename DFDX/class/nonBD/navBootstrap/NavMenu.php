<?php
namespace class\nonBD\navBootstrap;

/**
  * the class should draw a menu from different objects
  * implement the Composite pattern
  */
/**
 * класс должен нарисовать меню из разных объектов
 * реализовать шаблон Composite
 */

 /**
  * Как пользоваться классами.
  * Класс использует разметку Бктстрапа 5.0 для создания разметки 
  * меню.
  * В меню могут быть простые кнопки и выпадающие меню. Вложенного 
  * выпадающего меню в выпадающее меню нет. Только один уровень
  * вложенного меню.
  * Система построена по шаблону Composite, это означает, что 
  * есть один простой класс, из которого всё создается, один 
  * сложный класс - как контейнер для простого и общий класс,
  * который принимает в себя оба первых класса и создает меню.
  
  * Правило 1. Чтобы не использовать дополнительно контейнер свойств
  * все стилевые настройки и другие настройки находятся в своих свойствах
  * в первой абстрактном классе INavMenu. Значения по умолчанию взяты
  * из первого примера в бутстрапе. Внизу страницы пример в комментарии.
  * Если необходимо изменить одно или несколько свойст, следует воспользоваться
  * методом setProperty($nameProperty, $dataProperty);
  * Разумеется до этого следует создать объект главного класса:
  * $aaa = new NavMenu(); navbar-expand-lg
  * Пример, чтобы заменить стилевой класс navbar-expand-lg на navbar-expand-xl
  * следует использовать метод таким образом:
  * $aaa->setProperty('navbar-expand-lg', 'navbar-expand-xl');
  * Таким образом можно заменить любой класс в шаблоне navbar .
  *
  * Правило 2. Чтобы меню появилось, после создания объекта, необходимо
  * в объект загрузить исходные объекты, простые или сложные. Простые
  * объекты выводят одиночную кнопку в меню, сложный объект выводит
  * выпадающее меню.
  *
  * Так как это Composite, всё меню состоит из простых объектов, 
  * которые либо сами отправляются в главный класс, либо попадают 
  * в промежуточный контейнер и с ним попадают в главный класс.
  *
  * Правило 3. Простые объекты создаются классом: ElementNavBar.
  * $obj = new ElementNavBar(NavMenu $in);
  * В конструктор простого класса передается ссылка на главный класс
  * так как именно главный класс является контейнером свойств. 
  * Перед созданием простого объекта необходимо подготовить нужные
  * свойства в главном классе.
  * $aaa->setProperty('Home','Имя кнопки, которая будет создаваться');
  * $aaa->setProperty('link','ссылка, по умолчинию - это #');
  * Если объект будет создаваться для выпадающего меню, то есть будет 
  * сначала помещен в контейнер BoxNavMenu(), то необходимо запустить
  * ущё и следующую строку. 
  * $aaa->setProperty('work-box',true);
  * Когда все свойства заданы, можно создавать объект:
  * $list1 = new ElementNavBar($aaa); или 
  * $list1 = new ElementNavBar($aaa, true);
  * Второй случай необходим для получения горизонтальной разделительной линии
  * в выпадающем меню.
  *
  * Правило 4.
  * Если необходимо сделать выпадающее меню, то необходимо создать
  * сложный объект-контейнер.
  * $dropdaun = new BoxNavMenu($aaa);
  * Здесь дополнительных настроек не нужно, класс подтягивает из главного
  * класса все стилевые настройки.
  * После создания объйкта в него необходимо добавить созданные специально
  * для него объекты, смотри правило 3.
  * Добавляются объекты методом:
  * $dropdaun->addElement($list1);
  * $dropdaun->addElement($list2);
  * $dropdaun->addElement($listN);
  *
  * Правило 5. 
  * После того, как все обекты будут готовы их следует добавить в главный класс
  * Это следует делать тем-же методом, что и добавление в контейнер:
  * $aaa->addElement($list3); - простая кнопка
  * $aaa->addElement($list4); - простая кнопка
  * $aaa->addElement($list5); - простая кнопка
  * $aaa->addElement($dropdaun); - выпадающее меню.
  *
  * Дополнительно.
  * Чтобы убрать меню поиска:
  * $aaa->setProperty('button-search',false);
  * Чтобы указать название кнопки:
  * $list1->setProperty('Home','Нажми на меня');
  * Чтобы указать ссылку для кнопки
  * $list1->setProperty('link','ссылка');

  * Правило 6.
  * Чтобы появилось меню необходимо запустить метод:
  * $aaa->writeElement();
  *
  */

class NavMenu extends INavMenuDiff
{
    private $masObject = [];

    protected $navbar='navbar';
    protected $navbarExpandLg='navbar-expand-lg';
    protected $navbarLight='navbar-light';
    protected $bgLight='bg-light';
    protected $containerFluid='container-fluid';
    protected $navbarBrand='navbar-brand';
    protected $navbarBrandHref='#';
    protected $navbarBrandName='Navbar';
    protected $navbarToggler='navbar-toggler';
    protected $navbarTogglerIcon='navbar-toggler-icon';
    protected $navbarTogglerIconSpan='';
    protected $collapse='collapse';
    protected $navbarCollapse='navbar-collapse';
    protected $navbarNav='navbar-nav';
    protected $meAuto='me-auto';
    protected $mb2='mb-2';
    protected $mbLg0='mb-lg-0';
    protected $navItem='nav-item';
    protected $navLink='nav-link';
    protected $active='active';
    protected $dropdown='dropdown';
    protected $dropdownToggle='dropdown-toggle';
    protected $dropdownMenu='dropdown-menu';
    protected $dropdownDivider='dropdown-divider';
    protected $dropdownItem='dropdown-item';
    protected $dFlex='d-flex';
    protected $formControl='form-control';
    protected $me2='me-2';
    protected $btn='btn';
    protected $btnOutlineSuccess='btn-outline-success';
    protected $home='Home';

    public function writeElement()
    {
        /**
         * функция выводит первую часть навбара, которая постоянна по разметке.
         * в первой части изменяются только css классы и они есть по умолчанию
         * в суперклассе INavMenu, там же есть два метода get и set свойств
         */
        $this->firstLevel();  
                
        /**
         * Перебираем массив всех объектов и запускаем 
         * метод каждого из них.
         * Метод writeElement() рисует либо простую кнопку
         * либо выпадающее меню
         */
        $this->publicButton();
                
        /**
         * Конец формирования списка меню
         */
        echo '</ul>';

        /**
         * Функция выводит внопку Search и поле для ввода поиска, если свойство
         * $buttonSearch = true, по умолчанию свойство равно true и устанавливается
         * в абстрактном супер-классе
         */
        if ($this->getProperty('buttonSearch'))
            $this->lastLevel();
                
        /**
         * Закрывание формирования всего меню
         */
        echo '</div></div></nav>';
    }

    protected function publicButton()
    {
        /**
         * Перебираем массив всех объектов и запускаем 
         * метод каждого из них.
         * Метод writeElement() рисует либо простую кнопку
         * либо выпадающее меню
         */
        foreach ($this->masObject as $value) {
          $value->writeElement();
        }
    }

    function firstLevel()
    {
        echo '
        <nav class="'.$this->getProperty('navbar').' '.
          $this->getProperty('navbarExpandLg').' '.
          $this->getProperty('navbarLight').' '.
          $this->getProperty('bgLight').'">
          <div class="'.
            $this->getProperty('containerFluid').'">
            <a class="'.
              $this->getProperty('navbarBrand').'" href="'.
              $this->getProperty('navbarBrandHref').'">'.
              $this->getProperty('navbarBrandName').'</a>
            <button class="'.
              $this->getProperty('navbarToggler').'" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="'.
              $this->getProperty('navbarTogglerIcon').'"></span>
            </button>

            <div class="'.
              $this->getProperty('collapse').' '.
              $this->getProperty('navbarCollapse').'" id="navbarSupportedContent">
              
              <ul class="'.
                $this->getProperty('navbarNav').' '.
                $this->getProperty('meAuto').' '.
                $this->getProperty('mb2').' '.
                $this->getProperty('mbLg0').'
              ">';
    }

    function lastLevel()
    {
        echo '
              </ul>
              <form class="'.
                $this->getProperty('dFlex').'
              ">
                <input class="'.
                  $this->getProperty('formControl').' '.
                  $this->getProperty('me2').'" 
                  type="search" 
                  placeholder="Search" 
                  aria-label="Search
                ">
                <button 
                  class="'.$this->getProperty('btn').' '.
                           $this->getProperty('btnOutlineSuccess').'" 
                  type="submit">
                  Search
                </button>
              </form>

        ';
    }

    public function addElement(INavMenu $element)
    {
        $this->masObject[] = $element;
    }

    public function renameElement(INavMenu $element)
    {
        foreach($this->masObject as $key=>$value) {
            if ($value === $element) {
                unset($this->masObject[$key]);
                return true;
            }
        }
    }
}

// Пример с сайта бутстрапа, эти стилевые свойства использованы
// как свойства по умолчанию.

// <nav class="navbar navbar-expand-lg navbar-light bg-light">
//   <div class="container-fluid">
//     <a class="navbar-brand" href="#">Navbar</a>
//     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
//       <span class="navbar-toggler-icon"></span>
//     </button>
//     <div class="collapse navbar-collapse" id="navbarSupportedContent">
//       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
//         <li class="nav-item">
//           <a class="nav-link active" aria-current="page" href="#">Home</a>
//         </li>
//         <li class="nav-item">
//           <a class="nav-link" href="#">Link</a>
//         </li>
//         <li class="nav-item dropdown">
//           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
//             Dropdown
//           </a>
//           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
//             <li><a class="dropdown-item" href="#">Action</a></li>
//             <li><a class="dropdown-item" href="#">Another action</a></li>
//             <li><hr class="dropdown-divider"></li>
//             <li><a class="dropdown-item" href="#">Something else here</a></li>
//           </ul>
//         </li>
//         <li class="nav-item">
//           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
//         </li>
//       </ul>
//       <form class="d-flex">
//         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
//         <button class="btn btn-outline-success" type="submit">Search</button>
//       </form>
//     </div>
//   </div>
// </nav>
