// Функции для класса настроек
function listSkillNumberTest()
{

    console.log('конструктор');
    // находим соответвующую форму
    name2=document.getElementById('listSkillRowSize');
    // регистрируем событие для проверки
    name2.addEventListener('input', listSkillRowSize, false);





    function listSkillRowSize()
    {
        if (name3.value<1 || name2.value>50) {
            name3.style.background='red';
            name3.setCustomValidity('Значение должно быть в пределах 1-50');
        } else {
            name3.style.background='white';
            name3.setCustomValidity('');
        }
    }


    new ErrorForPageSetting();
    // new IsValidFontSize();
    
}

class ErrorForPageSetting
{
    constructor ()
    {
        // this.name2=document.getElementById('listSkillFontSize');
        // this.name2.addEventListener('input', this.isValidFontSize, false);
    
        this.name1=document.getElementById('listSkillNumber');
        this.name1.addEventListener('input', this.isValidFontSize, false);
    }

    isValidFontSize()
    {
        if (this.name2.value<1 || this.name2.value>50) {
            this.name2.style.background='red';
            this.name2.setCustomValidity('Значение должно быть в пределах 1-50');
        } else {
            this.name2.style.background='white';
            this.name2.setCustomValidity('');
        }
    }

        isValidCool()
        {
            if (!this.isInList) {
                name1.style.background='red';
                name1.setCustomValidity('Allowed values: 1,2,3,4,6,12');
            } else {
                name1.style.background='white';
                name1.setCustomValidity('');
            }
        }

        isInList()
        {
            if (this.name1==1 ||
                  this.name1==2 ||
                    this.name1==3 ||
                      this.name1==4 ||
                        this.name1==6 ||
                          this.name1==12)
                          return true;
            return false;
        }
}








