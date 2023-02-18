<?php
namespace Object;

// class creates a form to fill in data for a new user
// the class controls the filling of forms and in case of an error, the data in the form is filled from the POST array
// класс создает форму для заполнение данных для нового пользователя
// класс контролирует заполняемость форм и в случае ошибки данные в форму заполняются из массива POST
class FormAdd
{
    private $city;
    private $zip;
    private $org;
    public function __construct(\ValueObject\Geo $geo)
    {
        // Get geo data if it was possible to determine the user's IP
        // Получаем гео данные,если удалось определить IP пользователя
        $this->city=$geo->getGeoParam('city');
        $this->zip=$geo->getGeoParam('zip');
        $this->org=$geo->getGeoParam('org');

        // Autocomplete forms at startup, or when refilling in case of an error
        // The block autofills the forms from the POST array, if it exists, or fills it with data by default.
        // Автозаполнение форм при старте, или при повторном заполнении в случае ошибки
        // Блок делает автозаполнение в формы из массива POST, если он есть, или заполняет данными по умолчанию.
        if (isset($_POST['name']) && $_POST['name']!='') $this->name=$_POST['name']; else $this->name='Name';
        if (isset($_POST['userName']) && $_POST['userName']!='') $this->nameName=$_POST['userName']; else $this->nameName='UserName';

        if (isset($_POST['email']) && $_POST['email']!='') $this->email=$_POST['email']; else $this->email='Email';
        if (isset($_POST['phone']) && $_POST['phone']!='') $this->phone=$_POST['phone']; else $this->phone='Phone';
        if (isset($_POST['website']) && $_POST['website']!='') $this->website=$_POST['website']; else $this->website='Website';
        
        if (isset($_POST['suite']) && $_POST['suite']!='') $this->suite=$_POST['suite']; else $this->suite='Office not specified';
        if (isset($_POST['street']) && $_POST['street']!='') $this->street=$_POST['street']; else $this->street='Street not specified';
        
        if (isset($_POST['Company_slogan']) && $_POST['Company_slogan']!='') $this->companySlogan=$_POST['Company_slogan']; else $this->companySlogan='Company slogan';
        if (isset($_POST['Company_BS']) && $_POST['Company_BS']!='') $this->companyBS=$_POST['Company_BS']; else $this->companyBS='Company BS';
        
        if ($this->city=='') $this->city='City';
        if (isset($_POST['city']) && $_POST['city']!='') $this->city=$_POST['city'];
        if ($this->zip=='') $this->zip='Zip code';
        if (isset($_POST['zip']) && $_POST['zip']!='') $this->zip=$_POST['zip'];
        if ($this->org=='') $this->org='Name company';
        if (isset($_POST['name_company']) && $_POST['name_company']!='') $this->org=$_POST['name_company'];
    }

    public function __toString()
    {
        return ' 
                 <section class="container-fluid">
                 <div class="form-add-div">
                 <form action="#" method="post" class="form-add-form">

                     <div class="row input-text">
                       <div class="col-6">
                       <div class="row">
                         <div class="col-6">
                           <h6>Name</h6>
                           <input type="text" name="name" value="'.$this->name.'">
                         </div>
                         <div class="col-6">
                           <h6>User Name</h6>
                           <input type="text" name="userName" value="'.$this->nameName.'">
                         </div>
                           </div>
                       </div>
                     </div>

                     <div class="row input-text">
                     <div class="col-6">
                         <div class="row">
                           <div class="col-6">
                             <h6>Email</h6>
                             <input type="text" name="email" value="'.$this->email.'"> 
                           </div>
                           <div class="col-6">
                             <h6>Phone</h6>
                             <input type="text" name="phone" value="'.$this->phone.'">
                           </div>
                         </div>
                     </div>
                     <div class="col-6">
                         <h6>Website</h6>
                         <input type="text" name="website" value="'.$this->website.'">
                     </div>
                     </div>

                     <div class="row input-text">
                     <div class="col-6">
                         <div class="row">
                           <div class="col-6">
                             <h6>Address suite</h6>
                             <input type="text" name="suite" value="'.$this->suite.'"> 
                           </div>
                           <div class="col-6">
                             <h6>Address street</h6>
                             <input type="text" name="street" value="'.$this->street.'">
                           </div>
                         </div>
                     </div>

                     <div class="col-6">
                       <div class="row">
                         <div class="col-6">
                             <h6>Address city</h6>
                             <input type="text" name="city" value="'.$this->city.'">
                         </div>
                         <div class="col-6">
                             <h6>Zip code</h6>
                             <input type="text" name="zip" value="'.$this->zip.'">
                         </div>
                        </div> 
                     </div>
                     </div>

                     <div class="row input-text">
                     <div class="col-6">
                         <div class="row">
                           <div class="col-6">
                             <h6>Name company</h6>
                             <input type="text" name="name_company" value="'.$this->org.'">
                           </div>
                           <div class="col-6">
                             <h6>Company slogan</h6>
                             <input type="text" name="Company_slogan" value="'.$this->companySlogan.'">
                           </div>
                         </div>
                     </div>
                     <div class="col-6">
                         <h6>Company BS</h6>
                         <input type="text" name="Company_BS" value="'.$this->companyBS.'">
                     </div>
                     </div>

                     <div class="row">
                     <div class="col-12">
                         <input type="submit" name="Save" value="SAVE" class="btn btn-secondary button">
                     </div>
                     </div>

                 </form>
                 </div>
                 </section>';
    }
}
