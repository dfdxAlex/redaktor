// Функции для класса настроек
function listSkillNumberTest()
{
    // находим соответвующую форму
    name1=document.getElementById('listSkillNumber');
    // регистрируем событие для проверки
    name1.addEventListener('input', testErrorNumberSkillList, false);

    // находим соответвующую форму
    name2=document.getElementById('listSkillFontSize');
    // регистрируем событие для проверки
    name2.addEventListener('input', listSkillFontSize, false);

    // находим соответвующую форму
    name2=document.getElementById('listSkillRowSize');
    // регистрируем событие для проверки
    name2.addEventListener('input', listSkillRowSize, false);

    // функция проверки правильности ввода числа столбцов 
    function testErrorNumberSkillList()
    {
        if (name1.value<1 
            || name1.value>12
            || name1.value==5
              || name1.value==7
                || name1.value==8
                  || name1.value==9
                    || name1.value==10
                      || name1.value==11) {
            name1.style.background='red';
            name1.setCustomValidity('Allowed values: 1,2,3,4,6,12');
        } else {
            name1.style.background='white';
            name1.setCustomValidity('');
        }
    }

    // проверяем размер шрифта
    function listSkillFontSize()
    {
        if (name2.value<1 || name2.value>50) {
            name2.style.background='red';
            name2.setCustomValidity('Значение должно быть в пределах 1-50');
        } else {
            name2.style.background='white';
            name2.setCustomValidity('');
        }
    }

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
}








