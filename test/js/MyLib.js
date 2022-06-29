// функция создает массив с несколькими прородителями
function masSum5(obj1,obj2,obj3,obj4,obj5)
{
    var objReturn = [];                  //создается пустой стартовый объект

        for (xxx in obj1)                // перебираются все свойства первого объекта
            objReturn[xxx]=obj1[xxx];
     
        for (xxx in obj2)                // перебираются все свойства первого объекта
            objReturn[xxx]=obj2[xxx];

        for (xxx in obj3)                // перебираются все свойства первого объекта
            objReturn[xxx]=obj3[xxx];

        for (xxx in obj4)                // перебираются все свойства первого объекта
            objReturn[xxx]=obj4[xxx];

        for (xxx in obj5)                // перебираются все свойства первого объекта
            objReturn[xxx]=obj5[xxx];

    return objReturn;
}
// функция создает объект с несколькими прородителями
function extend5(obj1,obj2,obj3,obj4,obj5)
{
    var objReturn = {};                  //создается пустой стартовый объект

        for (xxx in obj1)                // перебираются все свойства первого объекта
            objReturn[xxx]=obj1[xxx];
     
        for (xxx in obj2)                // перебираются все свойства первого объекта
            objReturn[xxx]=obj2[xxx];

        for (xxx in obj3)                // перебираются все свойства первого объекта
            objReturn[xxx]=obj3[xxx];

        for (xxx in obj4)                // перебираются все свойства первого объекта
            objReturn[xxx]=obj4[xxx];

        for (xxx in obj5)                // перебираются все свойства первого объекта
            objReturn[xxx]=obj5[xxx];

    return objReturn;
}
//////////////////////////////////////////////////////////////////////////////////
// функция сравнивает массивы и объекты и анализирует результат
function MasToMas()
{
    this.obj1Length = 0;       // хранит длину первого объекта
    this.obj2Length = 0;       // хранит длину первого объекта
    this.info1="";             // хранит вывод касательно длины объектов
    this.info2="";             // хранит вывод касательно вхождения второго объекта в первый
    this.info3="";             // хранит вывод касательно вхождения первого объекта во второй
    this.info4="";             // хранит вывод касательно равенства объектов по свойствам
    this.info5="";             // хранит результат сравнения

    this.objAnalysis = function(obj1,obj2)               // функция анализирует объекты
    {
    for (xxx in obj1) 
        if (obj1[xxx]!==undefined) this.obj1Length++;    // определяем длину первого объекта
    
    for (xxx in obj2) 
        if (obj2[xxx]!==undefined) this.obj2Length++;    // определяем длину второго объекта

    if (this.obj1Length>this.obj2Length) this.info1="первый объект больше";          // сравниваем длины объектов и помещаем информацию
        else if (this.obj1Length<this.obj2Length) this.info1="второй объект больше"; // в свойство info1
            else this.info1="объекты одинаковы по длине";

    if (this.obj1Length>this.obj2Length)                            // если объект 2 меньше объекта 1
        for (xxx in obj2)                                           // то проверяем содержит ли объект 1 все свойства объекта 2
            if (obj1[xxx]!==obj2[xxx])
                this.info2="Объект 2 не входит в объект 1";

    if (this.obj1Length<this.obj2Length)                            // если объект 2 больше объекта 1
        for (xxx in obj1)                                           // то проверяем содержит ли объект 2 все свойства объекта 1
            if (obj1[xxx]!==obj2[xxx])
                this.info3="Объект 1 не входит в объект 2";

    if (this.obj1Length==this.obj2Length)                           // если объекты одинаковой длины
        for (xxx in obj1)                                           // проверяем есть ли все свойства одного объекта во втором объекте
            if (obj1[xxx]!==obj2[xxx])
                this.info4="Объект 1 и 2 не равны";
    
    // Анализируем результат сравнений и делаем вывод, записываем его в свойство info5
    if (this.obj1Length>this.obj2Length && this.info2=="") this.info5="Объект 2 входит в объект 1"; 
    if (this.obj1Length<this.obj2Length && this.info3=="") this.info5="Объект 1 входит в объект 2"; 
    if (this.obj1Length==this.obj2Length && this.info4=="") this.info5="Объект 1 равен по свойствам объекту 2"; 
    }                  
}

// функция преобразовывает массив в объект
function masToObj(mas)
{
    var masRez={};                                      // создаем новый локальный массив
    for (xxx in mas) {                                  // просматриваем все элементы массива или объекта
        if (mas[xxx]!==undefined) {                     // проверяем не является ли элемент undefined
        masRez[xxx]=mas[xxx];                           // если элемент определен, то скопировать его в объект
        }
    }
    return masRez;
}
// преобразовать объект или обычный массив в ассоциативный массив, удаляет разряженные массивы
function masToAssoc(mas)
{
    var masRez=[];                                      // создаем новый локальный массив
    for (xxx in mas) {                                  // просматриваем все элементы массива или объекта
        if (mas[xxx]!==undefined) {                     // проверяем не является ли элемент undefined
        masRez[xxx]=mas[xxx];                   // если элемент определен, то скопировать его в массив
        }
    }
    return masRez;
}

// преобразовать объект или ассоциативный массив в обычный массив, удаляет разряженные массивы
function masAssocToMas(mas)
{
    var i=0;
    var masRez=[];                                      // создаем новый локальный массив
    for (xxx in mas) {                                  // просматриваем все элементы массива или объекта
        if (mas[xxx]!==undefined)                       // проверяем не является ли элемент undefined
        masRez[i++]=mas[xxx];                           // если элемент определен, то скопировать его в массив
    }
    return masRez;
}
//////////////////////////////////////////////////////////////////////////////////
// функция проверяет номер телефона, если он подходит для Польши, то возвращает объект {tel:tel, rez:rez}
function numerTel(str)
{
    var pattern=/\+48[0-9]{9}/g;                 // регулярное выражение проверяет есть ли в номере телефона +48 + 9 цифр после этого
    if (pattern.test(str) && str.length==12) {   // если регулярное выражение подходит и длина строки 12 символов, то номер нормальный
        return {tel:str, rez:true}               // возвращаем объект с номером и результатом проверки
    } else {
        return {tel:str, rez:false}              // возвращаем объект с номером и результатом проверки
    }
}

// функция очищает строку от цифр и знаков, пробелы остаются
function clearStr(str)
{
    var pattern=/[^a-zA-Zа-яёА-ЯЁ\s]*/g;        // регулярное выражение находит любую небукву кроме пробела
    var strNew=str;
    return strNew.replace(pattern,'');           // заменяем любую небукву кроме пробела пустым символом
}

// функция оставляет в строке только цифры RegExp
function onlyNumbers(str)
{
    var pattern=/\D/g;                           // регулярное выражение находит любую нецифру
    var strNew=str;
    return strNew.replace(pattern,'');           // заменяем любую нецифру пустым символом
}
//////////////////////////////////////////////////////////////////////////////////
//функция прячет элемент на странице с заданным ID
function killElement(id)
{
    var idUrl = document.getElementById(id);        // получаем ссылку на элемент с заданным ID
    if (idUrl!==null) {                             // Если есть объект с таким ID
        idUrl.style.display = "none";               // Добавить новое свойство для элемента
    } else {
        console.log("Документ с id=${id} не найден");
    }
}

// функция создает кнопку с именем ID, если такой кнопки нет в документе
function ButtonSet()
{
    this.id=null;                             // свойство содержит элемент HTML или null
    this.idUser="";                           // хранит атрибут id, заданный пользователем
    this.buttonSearch=function(id)
    {
        this.idUser=id;                       // помещаем в свойство заданный пользователем ID аттрибут кнопки
        this.id=document.getElementById(id);  // поиск элемента html с заданным атрибутом id
    }
    this.buttonSet=function()
    {
        if (this.id===null) {
            const btn = document.createElement("button");   // создаем элемент HTML button
            btn.innerHTML = "Кнопка с id="+this.idUser;     // создаем надпись на кнопке
            btn.id = this.idUser;                           // добавить id атрибут кнопки
            document.body.appendChild(btn);                 // установить элемент в конец элемента body
        }
    }
}

//Предлагаем пользователю перейти сайт google, если пользователь соглашается,то переходим
function StayOrGo()
{
    this.goUrl=window.location;        // Узнать, на какой странице находится пользователь.
    this.goUrlF=function()
    {
        window.location=this.goUrl;    // записываем новое значение в свойство window.location
    }
    this.userСhoice=function()
    {
        return window.confirm("Желаете перейти на сайт google.com?");  // выводим модальный диалог
    }
}

// Конструктор вычисляет расстояние от точки до точки используя теорему Пифагора
function XY(x1,y1,x2,y2)
 {                                           // Конструктор, хранящий данные координат
    this.x1=x1;                              // Свойства для хранения координат
    this.y1=y1;                              // Свойства для хранения координат
    this.x2=x2;                              // Свойства для хранения координат
    this.y2=y2;                              // Свойства для хранения координат
}

XY.prototype.dist = function()         // добавляем метод в уже существующий конструктор используя прототипы
    {
        var a=this.x2-this.x1;         // считаем расстояние между координатами x - один катет
        var b=this.y2-this.y1;         // считаем расстояние между координатами y - второй катет
        var l=Math.sqrt(a*a+b*b);      // считаем квадратный корень от суммы квадратов катетов
        return l;                      // возвращаем значение
    }

//////////////////////////////////////////////////////////////////////////////////////////////////

// объект вычисляет расстояние от точки до точки используя теорему Пифагора
point={
    x1:0,                              // Свойства для хранения координат
    y1:0,                              // Свойства для хранения координат
    x2:0,                              // Свойства для хранения координат
    y2:0,                              // Свойства для хранения координат
    dist:function ()                   // метод считает расстояние от точки 1 до точки 2 по теореме Пифагора
    {
        var a=this.x2-this.x1;         // считаем расстояние между координатами x - один катет
        var b=this.y2-this.y1;         // считаем расстояние между координатами y - второй катет
        var l=Math.sqrt(a*a+b*b);      // считаем квадратный корень от суммы квадратов катетов
        return l;                      // возвращаем значение
    }
};

// Конструктор вычисляет расстояние от точки до точки используя теорему Пифагора
function PointXY()
{
    this.x1=0;                              // Свойства для хранения координат
    this.y1=0;                              // Свойства для хранения координат
    this.x2=0;                              // Свойства для хранения координат
    this.y2=0;                              // Свойства для хранения координат
    this.dist = function()                    // метод считает расстояние от точки 1 до точки 2 по теореме Пифагора
    {
        var a=this.x2-this.x1;         // считаем расстояние между координатами x - один катет
        var b=this.y2-this.y1;         // считаем расстояние между координатами y - второй катет
        var l=Math.sqrt(a*a+b*b);      // считаем квадратный корень от суммы квадратов катетов
        return l;                      // возвращаем значение
    }
}


