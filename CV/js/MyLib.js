// Функции для класса настроек
function listSkillNumberTest()
{
    name1=document.getElementById('listSkillNumber');
    name1.addEventListener('input', testErrorNumberSkillList, false);
    name2=document.getElementById('listSkillFontSize');
    name2.addEventListener('input', listSkillFontSize, false);

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
}

// функция обрабатывает событие клик по странице body когда сгенерировано CV 
/*function bodyClick()
{
    var name1=document.getElementById("form_setting");
    var name2=document.getElementById('button_form_setting');
    if (name2===null) {
        //name1.innerHTML='<input form="form_setting" type="submit" name="resetCreateCV" id="button_form_setting" value="<<<<<<<" class="btn btn-info">';
        //name1.innerHTML='<a href="cv.php?name=vernut" id="button_form_setting"  class="btn btn-info">Вернуться</a>';
    } 
    else {
        //name1.innerHTML='';
    }
}*/






