function writeHtml(str)
{
    document.write(str);
}

function allert()
{
    alert('Привет');
}
function clikclic()
{
    //var masP = document.getElementsByClassName('f25');
    var masP = document.querySelectorAll('p, div');
    //masP[2].onclick=allert;
    //masP[2].style.color="red";
    for (var zzz in masP) {
       masP[zzz].onclick=allert;
       masP[zzz].style.color="red";
    }
    p.onclick=allert;
}

