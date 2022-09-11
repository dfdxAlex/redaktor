// конструктор создает объект для работы с границей рабочей части
function BorderSet(bHeyght,bWidth)
{
    // находим кнопку, нажатие которой ставит или убирает рамку по границе рабочего поля
    var name2=document.getElementById('buttonBorder');
    // храним входные данные параметра поля
    var boxHeight=bHeyght;
    var boxWidth=bWidth;

    function setBorder()
    {
        // находим контейнер рабочего поля
        var name1=document.getElementById('workingField');
        // проверяем параметр границы рабочего поля
        var borderStyle=name1.style.border;

        // если граница вокруг рабочего поля есть, то убрать её
        if (borderStyle=="1px solid black") {
            name1.style.border="0px solid black";
        }
        // если границы у рабочего поля нет, то установить её
        else {
            name1.style.height=boxHeight;
            name1.style.width=boxWidth;
            name1.style.border="1px solid black";
        }
    }

    name2.onclick = setBorder;
}

