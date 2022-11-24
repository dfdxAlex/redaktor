#include "SPI.h" // библиотека поддерживающая работу интерфейсв SPI
#include "SD.h"

int val=110;


//SD card shield      Arduino Uno      Arduino Nano       Arduino Mega
//CS                  4                4                  53
//GND                 GND              GND                GND
//VCC                 5V               5V                 5V
//MOSI                11               11                 51
//MISO                12               12                 50
//SCK                 13               13                 52

// Варианты названия пинов у разных производителей.
//MISO: SOMI, SDO (на устройстве), DO, DON, SO, MRSR;
//MOSI: SIMO, SDI (на устройстве), DI, DIN, SI, MTST;
//SCLK: SCK, CLK, SPC (SPI serial port clock);
//SS: nCS, CS, CSB, CSN, NSS, nSS, STE, SYNC.

boolean begin=false;

void setup(){
   Serial.begin(9600); // инициализация мониторинга последовательного порта 

   begin=SD.begin(4);        // инициализация протокола SPI для работы библиотеки SD
   delay(500);
   // проверка успешности метода begin()
   if (begin)
       Serial.println("Инициализация протокола SPI прошла успешно");
   else Serial.println("Инициализация протокола SPI не удалась");

   begin=SD.exists("test7.txt");
   delay(500);
   // проверка успешности метода exists()
   if (begin)
       Serial.println("Файл существует");
   else Serial.println("файла нет");

   begin=SD.exists("test6");
   delay(500);
   // проверка успешности метода exists()
   if (begin)
       Serial.println("папка существует");
   else Serial.println("папки нет");

   begin=SD.mkdir("test2");
   delay(500);
   // проверка успешности метода mkdir()
   if (begin)
       Serial.println("папка успешно создана");
   else Serial.println("не удалось создать папку");
   

   begin=SD.rmdir("test6");
   delay(500);
   // проверка успешности метода rmdir()
   if (begin)
       Serial.println("папка успешно удалена");
   else Serial.println("не удалось удалить папку");

File beginf;
   beginf=SD.open("test7.txt", FILE_WRITE); // FILE_READ | FILE_WRITE
   delay(300);
   // проверка успешности метода mkdir()
   if (beginf) {
       Serial.println("файл успешно создан");
       beginf.close();
   }
   else Serial.println("файл не удалось создать");

   begin=SD.remove("test7.txt");
   delay(300);
   // проверка успешности метода rmdir()
   if (begin)
       Serial.println("файл успешно удален");
   else Serial.println("не удалось удалить файл");
   

}

void loop(void) {

}
