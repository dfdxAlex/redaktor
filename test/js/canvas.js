function initiate()
{
    var elem=document.getElementById("canvas");
    canvas5=elem.getContext('2d');

    var grad = canvas5.createRadialGradient(0,0,50,0,0,500);
    grad.addColorStop(0.2, "black");
    grad.addColorStop(0.4, "#ddd");
    grad.addColorStop(0.6, "blue");
    grad.addColorStop(0.8, "#444");
    grad.addColorStop(1, "red");

    canvas5.fillStyle=grad;
    canvas5.fillRect(0,0,500,500);
    


    //canvas5.strokeRect(20,20,50,50);
    //canvas5.clearRect(30,30,50,50);
    
    
    for(x=1,y=500; x<500; x++, y=500-((x-250)*(x-250)/30))
        canvas5.clearRect(x,y,2,2);


}

window.addEventListener("load",initiate,false);
