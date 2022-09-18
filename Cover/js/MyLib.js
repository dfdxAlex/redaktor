// конструктор создает объект для работы с границей рабочей части
function BorderSet(bHeyght,bWidth,bBackGround,nomerChecked)
{
    // находим кнопку, нажатие которой ставит или убирает рамку по границе рабочего поля
    var name2=document.getElementById('buttonBorder');
    var name3=document.getElementById('buttonOk');
    



    function setBorder()
    {
        // находим контейнер рабочего поля
        var name1=document.getElementById('workingField');

        // проверяем параметр границы рабочего поля
        var borderStyle=name1.style.border;
        

        name1.style.height=bHeyght;
        name1.style.width=bWidth;

        // если граница вокруг рабочего поля есть, то убрать её
        if (borderStyle=="1px solid black") {
            name1.style.border="0px solid black";

        }
        // если границы у рабочего поля нет, то установить её
        else {
            name1.style.border="1px solid black";
        }


    }

    function coverCreate()
    {
        // находим контейнер рабочего поля
        var name1=document.getElementById('workingField');
        name1.style.height=bHeyght;
        name1.style.width=bWidth;
        if (nomerChecked=='fon1' || nomerChecked=='fon2')
            name1.style.background=bBackGround;
    }

    // функция задает цвет фона для дивов, которые показывают, какой цвет выбран
    this.colorDivCircle = function(color1,color2)
    {
        var name1=document.getElementById('div_color_1');
        var name2=document.getElementById('div-color-2');
        name1.style.background=color1;
        name2.style.background=color2;
    }

    this.checkedFlag = function(fon)
    {
        // если выбрана первая радиокнопка то просто выйти из функции установки точки выбора
        if (fon=='fon1') return false;

        // если выбран любой радиобаттон кроме первого, то удалить точку с первого радиобаттона
        var nameRadio1=document.getElementById('fon1');
        nameRadio1.checked = false;
        var nameRadio2=document.getElementById('fon2');
        var nameRadio3=document.getElementById('fon3');
        var nameRadio4=document.getElementById('fon4');

        if  (fon=='fon2') nameRadio2.checked = true;
        if  (fon=='fon3') nameRadio3.checked = true;
        if  (fon=='fon4') nameRadio4.checked = true;
    }

    name2.onclick = setBorder;
    name3.onclick = coverCreate;
}

