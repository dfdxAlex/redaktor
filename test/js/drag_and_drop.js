window.addEventListener("load",initiate,false);

//dragstart начали перетаскивание
//drag  пользователь переносит куда-то оъект
//dragend момент отпускания переносимого объекта
//dragenter  объект наехал на зону потенциальной цели
//dragleave  объект покидает зону сброса  (проверить в коде)
//dragover объект перетаскивается над целью сброса.
//drop елемент сброшен в допустимой зоне

function initiate()
{


    drop=document.getElementById('dropbox');

    drop.addEventListener('dragenter',entering,false); //объект наехал на зону потенциальной цели

    // срабатывает, когда элемент находится в целевом поле
    drop.addEventListener('dragover',function(e){
        e.preventDefault(); // отменяет действия по умолчанию
    },false);

    //отпустили элемент источник
    drop.addEventListener('drop',dropped,false);
}

function ending(e)
{
    //elem.style.visibility='hidden';
}


function dragged(e)
{
    //elem = e.target;
    //e.dataTransfer.setData('Text',elem.getAttribute('id'));  // добавляем информацию для перетаскивания в файл drag object
    //console.log(elem.getAttribute('id'));
    // определяет позиционирование эскиза относительно мышки
    //e.dataTransfer.setDragImage(e.target,0,0); 
}

function dropped(e)
{
    e.preventDefault();

    var files=e.dataTransfer.files;
    var list='';

    //console.log(e.dataTransfer.files);

    for (var f=0; f<files.length; f++) {
        list+='name:'+files[f].name+'---size:'+files[f].size+'<br>';
    }

    drop.innerHTML=list;
    // текст, который переношу - это id картинки
    //var id=e.dataTransfer.getData('Text');
    //console.log(id);
    //var elem=document.getElementById(id);
    // преобразовать абсолютную координату в координату полотна канвас
    //var posx=e.pageX-drop.offsetLeft;
    //var posy=e.pageY-drop.offsetTop;

    //canvas.drawImage(elem, posx, posy);

}


function entering(e)
{
    e.preventDefault();
}

function leaving(e)
{
    e.preventDefault();
}







