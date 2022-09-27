function initiate()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    canvas5.beginPath();

    //canvas5.moveTo(x1,y1);      // перенести перо в координаты

    // координаты начала
    var x1=50;
    var y1=50;

    // Контрольная точка
    var x3=450;
    var y3=150;

    // Контрольная точка
    var x4=150;
    var y4=350;

    // координаты конца
    var x2=450;
    var y2=450;

    // кубическая кривая Безье
    canvas5.moveTo(x1,y1);

    canvas5.lineWidth=15;       // Толщина линии
    //canvas5.lineCap='butt';   // концы по умолчанию
    //canvas5.lineCap='round';  // концы закруглены
    //canvas5.lineCap='square'; // концы квадратами

    //canvas5.lineJoin="round";   // форма соединения двух линий
    //canvas5.lineJoin="bevel";
    canvas5.lineJoin="miter";
    canvas5.miterLimit=2;
    canvas5.bezierCurveTo(x3,y3,x4,y4,x2,y2);
    //canvas5.moveTo(x2+1,y2+1);
    canvas5.bezierCurveTo(x3,y3,x4,y4,x1,y1);







    canvas5.moveTo(x1,y1);
    //canvas5.arc(x1,y1,2,0,2*Math.PI);

    canvas5.moveTo(x2,y2);
    //canvas5.arc(x2,y2,2,0,2*Math.PI);

    canvas5.moveTo(x3,y3);
    //canvas5.arc(x3,y3,2,0,2*Math.PI);

    canvas5.moveTo(x4,y4);
    //canvas5.arc(x4,y4,2,0,2*Math.PI);



    canvas5.stroke();


}

window.addEventListener("load",initiate,false);
