class CheckNumberOfColumns
{
    constructor ()
    {
        let name1=document.getElementById('listSkillNumber');
        if (name1!=null) {
            name1.addEventListener('input', this.isValidCool.bind(this), false);
        }
    }

    isInList(name1)
    {
        if (name1==1 ||
              name1==2 ||
                name1==3 ||
                  name1==4 ||
                    name1==6 ||
                      name1==12)
                      return true;
        return false;
    }
    isValidCool()
    {
        let name1=document.getElementById('listSkillNumber');
        if (!this.isInList(name1.value)) {
            name1.style.background='red';
            name1.setCustomValidity('Allowed values: 1,2,3,4,6,12');
        } else {
            name1.style.background='white';
            name1.setCustomValidity('');
        }
    }
}








