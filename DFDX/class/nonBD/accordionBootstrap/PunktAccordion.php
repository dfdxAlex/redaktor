<?php
namespace class\nonBD\accordionBootstrap;

class PunktAccordion extends \class\nonBD\accordionBootstrap\IAccordionPunkt
{
    /**
     * Подставляется в соответствующее место в разметку.
     * Если остаётся как есть, то меню будет закрывать ранее
     * открытые пункты аккордиона. Если свойство сбросить в пустую
     * строку, то пункты будут оставаться открытыми.
     */
    private $dataBsParentR = 'data-bs-parent="#accordionExample';

    // /**
    //  * пункт меню содержится тут, после создания объекта
    //  */
    // private $thePunkt;
    /**
     * Метод должен сформировать один элемент аккордиона
     * используя параметры, установленные в материнском классе
     * Материнский класс-контейнер передается через переменную
     * $container
     */
    // public function __construct(IAccordionContainer $container)

    public function writeElement()
    {
      
        if (!$this->getProperty('data-bs-parent')) {
            $this->dataBsParentR = '';
        }

        echo '
          <div class="'.$this->getProperty('accordion-item').'">
            <h2 class="'.$this->getProperty('accordion-header').'" id="heading'.$this->getProperty('id').'">
              <button class="'.$this->getProperty('accordion-button').'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$this->getProperty('id').'" aria-expanded="true" aria-controls="collapse'.$this->getProperty('id').'">
                '.$this->getProperty('button').'
              </button>
            </h2>
            <div id="collapse'.$this->getProperty('id').'" class="'.$this->getProperty('accordion-collapse').' '.$this->getProperty('collapse').' '.$this->getProperty('show').'" aria-labelledby="heading'.$this->getProperty('id').'" '.$this->dataBsParentR.'">
              <div class="'.$this->getProperty('accordion-body').'">
                '.$this->getProperty('mesages').'
              </div>
            </div>
          </div>
        ';
        
    }
}
