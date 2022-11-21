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
    var id;
    sourse1 = document.getElementById('image');
    sourse2 = document.getElementById('img2');
    sourse3 = document.getElementById('image3');
    //console.log(sourse3.id);

    // срабатывает при старте перетаскивания
    sourse1.addEventListener('dragstart',dragged,false);
    sourse2.addEventListener('dragstart',dragged,false);
    sourse3.addEventListener('dragstart',dragged,false);

    sourse1.addEventListener('dragend',ending,false);
    sourse2.addEventListener('dragend',ending,false);

    drop = document.getElementById('dropbox');
    drop2 = document.getElementById('dropbox2');

    drop.addEventListener('dragenter',entering,false); //объект наехал на зону потенциальной цели
    drop2.addEventListener('dragenter',entering,false); //объект наехал на зону потенциальной цели
    drop.addEventListener('dragleave',leaving,false);  // объект покидает зону сброса  (проверить в коде)
    drop2.addEventListener('dragleave',leaving,false);  // объект покидает зону сброса  (проверить в коде)

    // срабатывает, когда элемент находится в целевом поле
    drop.addEventListener('dragover',function(e){
        e.preventDefault(); // отменяет действия по умолчанию
    },false);

        // срабатывает, когда элемент находится в целевом поле
        drop2.addEventListener('dragover',function(e){
            e.preventDefault(); // отменяет действия по умолчанию
        },false);

    //отпустили элемент источник
    drop.addEventListener('drop',dropped,false);
    drop2.addEventListener('drop',dropped,false);
}

function entering(e)
{
    ee = e.target;
    e.preventDefault();
    if ((id=="image" && ee.id=="dropbox") 
        || (id=="img2" && ee.id=="dropbox2")) 
            ee.style.background='rgba(0,250,0,.6)';
}

function leaving(e)
{
    var ee = e.target;
    e.preventDefault();
    if ((id=="image" && ee.id=="dropbox") 
        || (id=="img2" && ee.id=="dropbox2")) 
            ee.style.background='#FFFFFF';
}

function ending(e)
{
    elem=e.target;
    kor=e.offsetY;
    if (elem.id=="image" && kor<0)
        elem.style.visibility='hidden';
    if (elem.id=="img2" && kor>0)
        elem.style.visibility='hidden';
}

function dragged(e)
{
    ee = e.target;
    id=ee.id; // какой id переносим
    if (ee.id=="image3") return;
    var code='<img src="'+ee.getAttribute('src')+'" id="'+ee.getAttribute('id')+'">'; // создаем строку аттрибута - ссылки на картинку
    e.dataTransfer.setData('Text',code);  // добавляем информацию для перетаскивания в файл drag object
}

function dropped(e)
{
    e.preventDefault();
    var ee = e.target;
    if ((e.dataTransfer.getData('Text').includes("image") && ee.id=="dropbox") 
        || (e.dataTransfer.getData('Text').includes("img2") && ee.id=="dropbox2"))
            ee.innerHTML=e.dataTransfer.getData('Text'); // извлекаем данные из объекта перетаскивания и вставляем в контейнер drop
}


