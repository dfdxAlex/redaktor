
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


