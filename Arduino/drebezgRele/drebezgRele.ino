
// число найденных фронтов при одном замыкании или размыкании
volatile byte sis=0;
// текущий номер теста
int nomerTest=0;

// содержит значащие символы из числа тестов 
byte masNomerTest[10];
// содержит число символов во вводимом значении для числа тестов
int indexToMasNomerTest=0;

// переменная определяет состояние тестирования, тест идёт или не идёт
boolean testGo=false;

// массив с данными полученными при тесте
byte masFront[200];

boolean beginTest=false;

// переменные анализа результата
byte numberOfChecks=0; // число проверок
byte numberOfTik0=0; // число проверок c нулевым результатом, без дребезга
float numberTik=0;   // общее число дребезга

void setup() {
pinMode(13,OUTPUT);
//attachInterrupt(0,func,FALLING);
attachInterrupt(0, func, RISING);

Serial.begin(9600);

//функция выводит сообщение о том, какой именно контакт проверяется на дребезг NO или NC
helpNcOrNo();
}

void loop() {
  inputSerialPortIntedger();
  //Serial.println(test);
  
  delay(55);
}

void func(void)
{
    if (sis<255) sis++;
}

// функция возвращает число типа Int введенное в строку Монитора Порта
// Если выборка не производится, то каждый вызов функции уменьшает полученное число
// Число хранится в глобальное переменной nomerTest;
void inputSerialPortIntedger()
{
    // число символов в вводной цифре
  if (Serial.available() > 0) {
    
    nomerTest=0;
    // одна из вводимых цифр
    byte nomerTestLocal=0;

    // обнуляет массив с цифрой от монитора serial если тест только начинается
    resetMasInputMonitorSerial();
    
    // тест начался, в конце теста переменную обнулить в false
    beginTest=true; 
    
    // прочитать цифру из монитора Сериал
    nomerTestLocal = Serial.read();

    // поместить входные цифры в массив
    monitorSerialToMas(nomerTestLocal);
    
    if (nomerTestLocal==10) {
       strToInt();
       //return nomerTest;
    }
  } else {
    if (nomerTest>0) {
        if (!testGo) numberOfChecks=nomerTest;
        testGo=true;
        if (digitalRead(13)==HIGH) 
            digitalWrite(13,LOW);
        else 
            digitalWrite(13,HIGH);

        delay(20);
        masFront[nomerTest]=sis;
        sis=0;
        Serial.print("Тест на фронт №:");Serial.println(nomerTest);
        nomerTest--;
    } else if (testGo){
      
      Serial.println("Результат теста на фронт");
      //for (int i=0; i<numberOfChecks; i++) {
            //Serial.println(masFront[i]);
      //}
      for (int i=0; i<numberOfChecks; i++) {
           if (masFront[i]==0) numberOfTik0++;
           numberTik=numberTik+masFront[i];
      }
      
      Serial.println("Сводная информация"); //numberOfTik0
      Serial.print("Всего проверок:");Serial.println(numberOfChecks);
      Serial.print("Проверок с нулевым дребезгом:");Serial.print(numberOfTik0);Serial.print("......");Serial.print(100.00/numberOfChecks*numberOfTik0);Serial.println("% Ok");
      Serial.print("Среднее кол-во дребезга на включение/выключение:");Serial.println(numberTik/numberOfChecks);
      testGo=false;
      numberOfChecks=0;
      numberOfTik0=0;
      numberTik=0;
    }
  }
}

boolean resetMasInputMonitorSerial()
{
    // Если тест уже в работе, то выйти из функции и не обнулять массив
    if (beginTest) return false;
    // обнулить массив перед началом теста
    for (byte i=0; i<10; i++) {
        masNomerTest[i]=255;
    }
}

// Функция помещает вводимую с помощью Мониторинга порта информацию в массив преобразуя в цифры реальные
void monitorSerialToMas(int nomer)
{
  if (nomer!=10) masNomerTest[indexToMasNomerTest++]=nomer-48;
  else indexToMasNomerTest=0;
}

// Функция переводит информацию, полученную из мониторинга порта в цифровую
void strToInt() //nomerTest
{
   int indexLocal=0;
   for (int i=9; i>=0; i--) {
       if (masNomerTest[i]!=255) {
        int k=0;
        if (indexLocal==0) k=1;
        if (indexLocal==1) k=10;
        if (indexLocal==2) k=100;
        if (indexLocal==3) k=1000;
        if (indexLocal==4) k=10000;

        nomerTest=masNomerTest[i]*k+nomerTest;
        indexLocal++;
       }
   }
   // предполагаемое место окончания теста
   beginTest=false;
}

// Функция проверяет какой контакт проверяется, NC или NO
// Если возвращаем true, то работаем с NO контактом, иначе с NC
boolean ncOrNo()
{
  digitalWrite(13,LOW);
  //pinMode(2,INPUT_PULLUP);
  pinMode(2,INPUT);
  if (digitalRead(2)==HIGH) return false;
  else return true;
}

//функция выводит сообщение о том, какой именно контакт проверяется на дребезг NO или NC
void helpNcOrNo()
{
  if (ncOrNo()) Serial.println("Проверяем контакт NO");
  else Serial.println("Проверяем контакт NC");
  Serial.println("Для продолжения работы задайте колличество проверок, не больше 200");
}
