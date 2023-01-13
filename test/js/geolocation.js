function initiate()
{
    var get=document.getElementById('geolocation');
    get.addEventListener('click',getlocation,false);
}

function getlocation()
{
    geoConfig = {
        enableHightAccuracy:true,
        maximumAge: 1000,
    };
    navigator.geolocation.getCurrentPosition(showinfo,outError);
}

function showinfo(position)
{
    //console.log(position);
    var location=document.getElementById('canvasbox');
    var data='';
    //data="Широта:"+position.coords.latitude+'<br>';
    //data+="Долгота:"+position.coords.longitude+'<br>';
    //data+="Точность:"+position.coords.accuracy+'<br>';
    
    
    data="http://maps.google.com/maps/api/staticmap?center="+position.coords.latitude+","+position.coords.longitude+'&zoom=12&size=400x400&sensor=false&markers='+position.coords.latitude+","+position.coords.longitude;
    location.innerHTML="<img src='"+data+"'>";
    console.log(data);

}

function outError(errorOut)
{
    //PERMISSION_DENIED или 1 - пользователь запретил геолокацию
    //POSITION_UNAVAILABLE или 2 - невозможно определить позицию
    //TIMEOUT или 3 - слишком долгое ожидание определения позиции
    //console.log(errorOut);
    alert('Ошибка:'+errorOut.code+'--'+errorOut.message);
}

window.addEventListener('load',initiate,false);
