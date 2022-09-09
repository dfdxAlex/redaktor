function borderSet()
{
    
    name2=document.getElementById('buttonBorder');
    //buttonBorder

    function setBorder()
    {
        var name1=document.getElementById('workingField');
        var borderStyle=name1.style.border;

        if (borderStyle=="1px solid black") {
            name1.style.border="0px solid black";
        }
        else {
            name1.style.border="1px solid black";
        }
    }

    name2.onclick = setBorder;
}

