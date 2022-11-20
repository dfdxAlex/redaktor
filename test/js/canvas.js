window.addEventListener("load",createPreviewJs,false);

function test()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    var color1="#ED9121";
    var color2="#FFF0F5";
 

// градиент
   // var gradient=canvas5.createLinearGradient(0, 0, 0, 500);
   // gradient.addColorStop(0, color1);
   // gradient.addColorStop(1, color2);
   // canvas5.fillStyle = gradient;
   // canvas5.fillRect(0, 0, 800, 500);
// градиент

    window.addEventListener("mousemove",minus,false);
    
  }


  function minus2(igg)
  {
       canvas5.clearRect(0,0,500,500);
       var mouseX=igg.clientX;
       var mouseY=igg.clientY;

       var x=mouseX-30;
       var y=mouseY;
       var x2=mouseX+30;

       if (x>430) x=430;
       if (x2>490) x2=490;
       if (y>480) y=480;


       canvas5.beginPath();
       canvas5.moveTo(x+10,y);
       canvas5.arc(x,y,10,0,Math.PI*2,false);
       canvas5.moveTo(x2+60,y);
       canvas5.arc(x2,y,10,0,Math.PI*2,false);
       canvas5.fill();

     

  }

    // перетаскивание Drag and Drop
function createPreviewJs()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    var color1="Yellow";
    var color2="Orange";

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

    canvas5.shadowColor=color2;
    canvas5.shadowOffsetX=20;
    canvas5.shadowOffsetY=20;
    canvas5.shadowBlur=10;

    canvas5.font="bold 140px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("ES6",445,35,80);

    var ing = new Image();
    ing.src="patern2.png";
    ing.addEventListener("load",styleMyJs,false);

    canvas5.shadowColor=color1;
    canvas5.shadowOffsetX=20;
    canvas5.shadowOffsetY=20;
    canvas5.shadowBlur=10;

    var js = new Image();
    js.src="jslogo.png";
    js.addEventListener("load",function(){
        canvas5.drawImage(js,520,0,250,250);
    },false);
}

function styleMyJs(e)
{
    var ing4=e.target;
    var styleMy=canvas5.createPattern(ing4,'repeat');
    canvas5.fillStyle=styleMy;

    canvas5.font="bold 174px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    //canvas5.fillText("DRAG",15,135,400);
    canvas5.fillText("Java",15,135,500);
    canvas5.fillText("Script",135,295,500);
    //canvas5.fillText("DROP",315,335,430);

}

  // перетаскивание Drag and Drop
function createPreviewPhp()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    var color1="SteelBlue";
    var color2="LightSteelBlue";

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

    //canvas5.font="bold 40px arial";
    //canvas5.textAlign="start";
    //canvas5.textBaseline="top";
    //canvas5.fillText("API",645,45,60);

    var ing = new Image();
    ing.src="patern2.png";
    ing.addEventListener("load",styleMyPhp,false);

    canvas5.shadowColor=color1;
    canvas5.shadowOffsetX=0;
    canvas5.shadowOffsetY=0;
    canvas5.shadowBlur=0;

    var slon = new Image();
    slon.src="slon.png";
    slon.addEventListener("load",function(){
        canvas5.drawImage(slon,480,30,250,250);
    },false);
}

function styleMyPhp(e)
{
    var ing4=e.target;
    var styleMy=canvas5.createPattern(ing4,'repeat');
    canvas5.fillStyle=styleMy;

    canvas5.font="bold 274px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    //canvas5.fillText("DRAG",15,135,400);
    canvas5.fillText("PH",115,235,500);
    canvas5.fillText("P",495,265,500);
    //canvas5.fillText("DROP",315,335,430);

}

// перетаскивание Drag and Drop
function createPreviewDragAndDrop()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    var color1="#E0FFFF";
    var color2="#0000CD";

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

    canvas5.font="bold 40px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("API",645,45,60);

    var ing = new Image();
    ing.src="patern4.png";
    ing.addEventListener("load",styleMyDrop,false);
}

function styleMyDrop(e)
{
    var ing4=e.target;
    var styleMy=canvas5.createPattern(ing4,'repeat');
    canvas5.fillStyle=styleMy;

    canvas5.font="bold 174px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("DRAG",15,135,400);
    canvas5.fillText("&",515,135,300);
    canvas5.fillText("DROP",315,335,430);

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

    canvas5.font="bold 174px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("API",315,135,300);

    var ing = new Image();
    ing.src="patern1.png";
    ing.addEventListener("load",styleMy,false);
}

function styleMy(e)
{
    var ing4=e.target;
    var styleMy=canvas5.createPattern(ing4,'repeat');
    canvas5.fillStyle=styleMy;

    canvas5.font="bold 174px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("API",315,135,300);

    canvas5.font="bold 174px arial";
    canvas5.textAlign="start";
    canvas5.textBaseline="top";
    canvas5.fillText("Canvas",15,335);
}

/////////////////////////////////////////////////////////////////////
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

    //canvas5.shadowColor=color1;
    //canvas5.shadowOffsetX=20;
    //canvas5.shadowOffsetY=20;
    //canvas5.shadowBlur=10;

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
