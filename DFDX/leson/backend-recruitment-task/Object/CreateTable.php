<?php
namespace Object;

// The class creates a table with data from a json file
// The function createTab(true|false) directly creates a table with data
// The default input parameter is false, if set to true, there will be another column with delete buttons
// Класс создает таблицу с данными из файла типа json
// Непосредственно таблицу с данными создает функция createTab(true|false)
// Входной параметр по умолчанию равен false, если его задать как true, то будет ещё одна колонка с кнопками удаления
class CreateTable
{
    private $apButton;
    private $json;

    public function __construct($button=false)
    {
         // download the contents of the jason file into a variable
         // скачиваем содержимое файла джейсон в переменную
         $this->json=file_get_contents('dataset/users.json');

         // decode the file by converting it to a structured array
         // декодируем файл преобразуя его в структурированный массив
         $this->json=json_decode($this->json,$associative=true);
    }

    public function createTab($button=false)
    {
         //variable determines whether the table will have a column with a Delete User button
         //переменная определяет будет ли в таблице столбец с кнопкой Удалить Пользователя
         $this->apButton=$button;

        echo '<table class="table table-secondary table-striped table-bordered">
               <thead>
                 <tr class="table-info">
                     <th class="table-info">Name</th>
                     <th class="table-info">Username</th>
                     <th class="table-info">Email</th>
                     <th class="table-info">Address</th>
                     <th class="table-info">Phone</th>
                     <th class="table-info">Company</th>
                     '.$this->nullTh().'
                 </tr>
               </thead>
               <tbody">
                ';

        foreach ($this->json as $i=>$value) {
            if (array_key_exists($i,$this->json)) {
                echo '
                      <tr>
                          <td class="table-success">'.$value['name'].'</td>
                          <td class="table-success">'.$value['username'].'</td>
                          <td class="table-success">'.$value['email'].'</td>
                          <td class="table-success">'.$value['address']['street'].'<br>'
                               .$value['address']['zipcode'].'<br>'
                               .$value['address']['city'].'</td>
                          <td class="table-success">'.$this->telefon($value['phone']).'</td>
                          <td class="table-success">'.$value['company']['name'].'</td>
                          '.$this->createButton($value['id']).'
                      </tr>
                    ';
            }
        }

        echo '</tbody></table>';  
    }

    // function returns decoded array from json file, used as a tool in other classes
    // функция возвращает декодированный массив из файла json, используется как инструмент в других классах
    public function getFileJsonMas()
    {
        return $this->json;
    }

    // the function splits the phone string into 2 parts by space
    // the first part will be the first line in the cell
    // the second part, if any, will be the second row in the cell
    // функция разбивает строку телефона на 2 части по пробелу
    // первая часть будет первой строкой в клетке
    // вторая часть, если она есть, будет второй строкой в клетке
    private function telefon($tel)
    {
        $telefon=preg_split('/\s/',$tel);
        $telRez=$telefon[0];
        if (isset($telefon[1])) $telRez.='<br>'.$telefon[1];
        return $telRez;
    }

    // the function adds an empty cell to the header if you want to display delete buttons
    // функция добавляет пустую ячейку в заголовок, если нужно вывести кнопки удаления
    private function nullTh()
    {
        if ($this->apButton) return '<th class="table-info"></th>';
        return;
    }

    // the function puts the delete buttons if the parameter is set when creating the object
    // функция ставит кнопки удаления, если установлен параметр при создании объекта
    private function createButton($id)
    {
        if ($this->apButton) {
            return '<td  class="table-danger">
                        <form action="main.php" method="post">
                            <input type="submit" value="REMOVE BUTTON" class="remove-button" name="remove_'.$id.'">
                        </form>
                    </td>';
        }
        return;
    }
}
