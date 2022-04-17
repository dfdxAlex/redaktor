<?php
namespace Object;

// The class takes as a parameter one element of the array created by the FormToMas class
// Load the json file, convert it to an array, add a new array element to it
// convert array back to string and write it to json file
// Класс принимает параметром один элемент массива,созданный классом FormToMas
// Загружает файл json, преобразовывает его в массив, добавляет к нему новый элемент массива
// преобразовывает массив обратно в строку и записывает его в файл json
class SaveFormToJson
{
    public function __construct(\ValueObject\FormToMas $mas)
    {
        // terminate the object if the record button was not pressed or there is not enough data
        // прекратить работу объекта если не была нажата кнопка записи или не хватает данных
        if (isset($_POST['Save'])) {
           if (!$mas->getError()) {
                   echo 'Not all data is filled in correctly';
                   return;
               }
        } else return;

        // get ready array to write to file
        // получить готовый массив для записи в файл
        $masForm = $mas->getElementMas();

        // download the contents of the jason file into a variable
         // скачиваем содержимое файла джейсон в переменную
         $json=file_get_contents('dataset/users.json');

         // decode the file by converting it to a structured array
         // декодируем файл преобразуя его в структурированный массив
         $json=json_decode($json,$associative=true);

         // check for the presence of a user by phone number or email
         // проверить наличие пользователя по номеру телефона или почте
         foreach ($json as $value) {
              if ($value['phone']==$masForm['phone']) {
                  echo 'This phone is already in use by another user';
                  return;
              }
              if ($value['email']==$masForm['email']) {
                echo 'This mail is already in use by another user';
                return;
              }
         }

         // add a new array element to the general array
         // добавить новый элемент массива к общему массиву
         $json[$masForm['id']-1] = $masForm;

         // encode the array into a string to write the json file
         // кодируем массив в строку для записи файла json
         $json=json_encode($json,JSON_PRESERVE_ZERO_FRACTION);

         // write json string to json file
         // записываем строку json в файл json
         file_put_contents("dataset\users.json",$json);
    }
}
