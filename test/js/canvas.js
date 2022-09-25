function initiate()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    canvas5.beginPath();

    //canvas5.moveTo(0,0);      // перенести перо в координаты
    //canvas5.lineTo(50,50);    // рисовать от предыдущих координат к указанным
    //canvas5.moveTo(70,70);
    //canvas5.lineTo(100,100);

    //canvas5.moveTo(100,100);  // переносим перо на новое место
    //canvas5.lineTo(220,220);  // рисуем одну линию
    //canvas5.lineTo(280,120);  // рисуем вторую линию
    //canvas5.lineTo(280,320);  // рисуем вторую линию
    //canvas5.closePath();
    //canvas5.fill();           // соединияе начало и конец и закрашиваем

    //canvas5.lineTo(0,0);


    
    //canvas5.rect(130,130,50,50); // перо переносится на начало прямоугольника
    //canvas5.rect(30,30,50,50); // перо переносится на начало прямоугольника
    //canvas5.lineTo(40,40);
    //canvas5.fill();           // соединияе начало и конец и закрашиваем

    canvas5.moveTo(150,100);
    canvas5.arc(100, 100, 50, 0, Math.PI+3/2*Math.PI, false); // перо необходимо перенести на окружность

    //canvas5.moveTo(250,200);
    //canvas5.arc(200, 200, 50, 0, 2/3*Math.PI, true); // перо необходимо перенести на окружность

    canvas5.stroke();


}

window.addEventListener("load",initiate,false);
