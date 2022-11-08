window.addEventListener("load",createPreviewMQL4,false);

function test()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    var color1="#ED9121";
    var color2="#FFF0F5";
 

// градиент
    var gradient=canvas5.createLinearGradient(0, 0, 0, 500);
    gradient.addColorStop(0, color1);
    gradient.addColorStop(1, color2);
    canvas5.fillStyle = gradient;
    canvas5.fillRect(0, 0, 800, 500);
// градиент

    var ing = new Image();
    ing.src="api.png";
    ing.addEventListener("load",function(){
        canvas5.drawImage(ing,40,60,400,200,0,0,400,200);
    },false);

  }

// канвас
function createPreviewCanvas()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    var color1="#964B00";
    var color2="#FAF0BE";

    var gradient=canvas5.createLinearGradient(0, 0, 0, 500);
    gradient.addColorStop(0, color1);
    gradient.addColorStop(1, color2);
    canvas5.fillStyle = gradient;
    canvas5.fillRect(0, 0, 800, 500);

    canvas5.shadowColor=color2;
    canvas5.shadowOffsetX=3;
    canvas5.shadowOffsetY=3;

    canvas5.fillStyle=color2;
    canvas5.font="bold 40px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("Amator DED",15,15,350);

    canvas5.shadowColor=color1;
    canvas5.shadowOffsetX=20;
    canvas5.shadowOffsetY=20;
    canvas5.shadowBlur=10;

    canvas5.fillStyle=color1;
    canvas5.font="bold 174px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("API",315,135,300);

    canvas5.shadowColor=color1;
    canvas5.shadowOffsetX=20;
    canvas5.shadowOffsetY=20;
    canvas5.shadowBlur=10;

    canvas5.fillStyle=color1;
    canvas5.font="bold 174px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("Canvas",15,335);
}

//старые ролики html
function createPreviewHtmlStaroe()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    var color1="#5D8AA8";
    var color2="#F0F8FF";

    var gradient=canvas5.createLinearGradient(0, 0, 0, 500);
    gradient.addColorStop(0, color1);
    gradient.addColorStop(1, color2);
    canvas5.fillStyle = gradient;
    canvas5.fillRect(0, 0, 800, 500);

    canvas5.shadowColor=color2;
    canvas5.shadowOffsetX=3;
    canvas5.shadowOffsetY=3;

    canvas5.fillStyle=color2;
    canvas5.font="bold 40px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("Amator DED",15,15,350);

    canvas5.shadowColor=color1;
    canvas5.shadowOffsetX=20;
    canvas5.shadowOffsetY=20;
    canvas5.shadowBlur=10;

    canvas5.transform(1,0.1,-0.2,1,0,0);
    canvas5.fillStyle=color1;
    canvas5.font="bold 90px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("Старые",65,175);

    canvas5.shadowColor=color1;
    canvas5.shadowOffsetX=20;
    canvas5.shadowOffsetY=20;
    canvas5.shadowBlur=10;

    canvas5.setTransform(1,-0.1,0.2,1,0,0);
    canvas5.fillStyle=color1;
    canvas5.font="bold 90px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("ролики",370,245);

    canvas5.setTransform(1,0,0,1,0,0);
    canvas5.shadowColor=color1;
    canvas5.shadowOffsetX=20;
    canvas5.shadowOffsetY=20;
    canvas5.shadowBlur=10;

    canvas5.fillStyle=color1;
    canvas5.font="bold 200px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("HTML",15,335);
}



function createPreviewXampp()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    var color1="#ED9121";
    var color2="#FFF0F5";

    var gradient=canvas5.createLinearGradient(0, 0, 0, 500);
    gradient.addColorStop(0, color1);
    gradient.addColorStop(1, color2);
    canvas5.fillStyle = gradient;
    canvas5.fillRect(0, 0, 800, 500);

    canvas5.shadowColor=color2;
    canvas5.shadowOffsetX=3;
    canvas5.shadowOffsetY=3;

    canvas5.fillStyle=color2;
    canvas5.font="bold 40px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("Amator DED",15,15,350);

    canvas5.shadowColor=color1;
    canvas5.shadowOffsetX=20;
    canvas5.shadowOffsetY=20;
    canvas5.shadowBlur=10;

    canvas5.fillStyle=color1;
    canvas5.font="bold 174px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("XAMPP",15,335);
}

/*mql4*/
function createPreviewMQL4()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    var color1="#5D8AA8";
    var color2="#F0F8FF";

    var gradient=canvas5.createLinearGradient(0, 0, 0, 500);
    gradient.addColorStop(0, color1);
    gradient.addColorStop(1, color2);
    canvas5.fillStyle = gradient;
    canvas5.fillRect(0, 0, 800, 500);

    canvas5.shadowColor=color2;
    canvas5.shadowOffsetX=3;
    canvas5.shadowOffsetY=3;

    canvas5.fillStyle=color2;
    canvas5.font="bold 40px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("Amator DED",15,15,350);

    canvas5.shadowColor=color1;
    canvas5.shadowOffsetX=20;
    canvas5.shadowOffsetY=20;
    canvas5.shadowBlur=10;

    canvas5.fillStyle=color1;
    canvas5.font="bold 174px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("MQL4",15,335);

    var ing = new Image();
    ing.src="mql4.png";
    ing.addEventListener("load",function(){
        canvas5.drawImage(ing,540,60,200,200);
    },false);
}
