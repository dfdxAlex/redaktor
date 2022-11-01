function initiate()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    var color1="#2A52BE";
    var color2="#CC0000";


// градиент
    var gradient=canvas5.createLinearGradient(0, 0, 0, 500);
    gradient.addColorStop(0, color1);
    gradient.addColorStop(1, color2);
    canvas5.fillStyle = gradient;
    canvas5.fillRect(0, 0, 800, 500);
    //canvas5.strokeRect(0, 0, 800, 500);
// градиент

    canvas5.fillStyle=color2;
    canvas5.font="bold 40px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("Amator DED",15,15,350);

    canvas5.fillStyle=color1;
    canvas5.font="bold 174px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("Canvas",15,335);



}

window.addEventListener("load",initiate,false);
