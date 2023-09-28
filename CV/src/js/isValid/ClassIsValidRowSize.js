class ClassIsValidRowSize
{
    constructor ()
    {
    let name3=document.getElementById('listSkillRowSize');
        if (name3!=null) {
            name3.addEventListener('input', this.listSkillRowSize, false);
        }
    }

    listSkillRowSize()
    {
        if (name3.value<1 || name3.value>50) {
            name3.style.background='red';
            name3.setCustomValidity('Значение должно быть в пределах 1-50');
        } else {
            name3.style.background='white';
            name3.setCustomValidity('');
        }
    }

}
