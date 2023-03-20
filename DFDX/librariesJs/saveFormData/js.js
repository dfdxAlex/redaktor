/**
 * библиотека сохраняет содержимое форм на диске клиента
 * для работы достаточно подключить данный файл и 
 * восользоваться функцией save()
 */

var button;
var atrib;
var masElementSave = [];
var sessionOrLocal = true;

///////////////////////////////////////////////////////////////////
// id кнопки активирующей запись
setupButton('ok');
// список id полей, с которыми работаем
listSaveId('text',
           'text11',
           'text22',
           'text33'
           );
// true по умолчанию. если труе, то запись на всегда, если false, то на время сессии
typeSave(true);
///////////////////////////////////////////////////////////////////

window.addEventListener('load', initialSaveLoad, false);

/**
 * Задает имя атрибута для привязки, по умолчанию id
 * atrib - задает тип атрибута для привязки
 */
function setupButton(buttonF, atribut='id')
{
    button = buttonF;
    atrib = atribut;
}

/**
 *  функция инициализирует работу привязываясь к кнопке
 *  привязка к кнопке происходит по id или по другому
 *  атрибуту
 *  Параметр привязки задается функцией setupButton()
 */

function initialSaveLoad()
{
    if (atrib=='id') {
        var but = document.getElementById(button);
            but.addEventListener('click', save, false);
    }
    if (atrib == 'atrybut') {
        var but = document.getElementsByName(button);
        for(const butElement in but) {
            butElement.addEventListener('click', save, false);
        }
    }

    var resetB;
    resetB = document.querySelector('input[type="reset"]');
    if (resetB!=null) {
        resetB.addEventListener('click', resetF, false);
    }

    window.addEventListener('storage', load, false);
    load();
}

function resetF()
{
    if (sessionOrLocal) 
        localStorage.clear();
    else 
        sessionStorage.clear();
}

/**
 * функция помещает в мессив глобальный данные об элементах
 * значения которых необходимо записать
 */
function listSaveId(...args)
{
    masElementSave = args.concat();
}

/**
 *  функция определяет тип записи, session or local
 *  по умолчанию запись типа local - на всегда
 *  только, если это нужно изменить, следует применить 
 *  функцию с параметром false
 */
function typeSave(param)
{
    if (!param)
        sessionOrLocal = false;
}

/**
 * Функция записывает значения всех полей на диск
 */
function save()
{
    for (const element in masElementSave) {
        if (sessionOrLocal) 
            localStorage.setItem(masElementSave[element], document.getElementById(masElementSave[element]).value);
        else 
            sessionStorage.setItem(masElementSave[element], document.getElementById(masElementSave[element]).value);
    }
}

/**
 * функция читает значение всех полей с диска
 */
function load()
{
    let info;
    for (const element in masElementSave) {
        if (sessionOrLocal) {
            info = document.getElementById(masElementSave[element]);
            if (localStorage[masElementSave[element]]!=undefined)
                info.value = localStorage[masElementSave[element]];
        }
        else {
            info = document.getElementById(masElementSave[element]);
            if (sessionStorage[masElementSave[element]]!=undefined)
                info.value = sessionStorage[masElementSave[element]];
        }
    }
}


