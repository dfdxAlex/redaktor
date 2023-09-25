<?php
namespace class\translate\delegatorLang;

/**
 * Класс рисует поля для заполнения переведённых с русского фраз
 */
class PoleRedaktorLang
{
    private $inThis;
    public function __construct($inThis)
    {
        $this->inThis = $inThis;

        echo "<form 
        class={$this->classMode}form
        action='#' 
        method='post'
      > 
      <p>
        Вариант фразы на русском языке.
      </p>
      <div class='redaktor-lang'>
        <textarea 
          class='{$this->classMode}form--textarea'
          name='textarearu'
          value=''
        >
        </textarea>
      </div>
      <p>
        Варианты фраз на других языках.
      </p>
      ";
      foreach($this->in as $value) {
          if ($value!=='ru')
          echo "<div class='redaktor-lang'>
                  <p class='{$this->classMode}form--p'>
                    $value
                  </p>

                  <textarea 
                    class='{$this->classMode}form--textarea'
                    name='textarea$value'
                    value=''
                  >
                  </textarea>
                </div>
                  ";
        }
        echo "  <input
                  type='submit'
                  name='areaSubmit'
                > 
              </form>";
    }

  public function __get($property)
  {
      return $this->inThis->getPropertyPrivate($property);
  }
}
