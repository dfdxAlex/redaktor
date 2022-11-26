#include "SPI.h" // библиотека поддерживающая работу интерфейсв SPI
#include "SD.h"

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

int nomer=0;
int nomerTest=0;
int nomerFile=0;

void setup(){
   Serial.begin(9600); // инициализация мониторинга последовательного порта 

   begin=SD.begin(4);        // инициализация протокола SPI для работы библиотеки SD
   delay(500);
   // проверка успешности метода begin()
   if (begin)
       Serial.println("Инициализация протокола SPI прошла успешно");
   else Serial.println("Инициализация протокола SPI не удалась");

   String nom;
   int i;
   String nameS="test66";
   int tForDelay=1;
   
   for (i=0; i<100; i++) {
    nom=nameS+i;
    if (SD.mkdir(nom)) {
      //delay(tForDelay);
          if (SD.exists(nom)){
              nomer++;
              //delay(tForDelay);
              File fill;
              String nameFile="/test.txt";
              String nameFilePath=nom+nameFile;
              //Serial.println(nameFilePath);
              fill=SD.open(nameFilePath, FILE_WRITE);
              if (SD.exists(nameFilePath)) {
                  nomerFile++;
                  fill.close();
              }
            }
      }
    nomerTest++;
   }

  Serial.print("Число тестов:"); Serial.println(nomerTest);
  Serial.print("Число успешных созданных папок:");Serial.println(nomer);
  Serial.print("Число успешных созданных файлов:");Serial.println(nomerFile);

}

void loop(void) {

}
