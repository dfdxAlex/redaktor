class ClassIsValidFontSize
{
    constructor ()
    {
        let name2=document.getElementById('listSkillFontSize');
        if (name2!=null) {
            name2.addEventListener('input', this.isValidFontSize, false);
        }
    }

    isValidFontSize()
    {
        let name2=document.getElementById('listSkillFontSize');
        if (name2.value<1 || name2.value>50) {
            name2.style.background='red';
            name2.setCustomValidity('Значение должно быть в пределах 1-50');
        } else {
            name2.style.background='white';
            name2.setCustomValidity('');
        }
    }
}
