#include "SPI.h"
#include "SD.h"

Sd2Card card;
SdVolume volume;
SdFile root;

//SD card shield      Arduino Uno      Arduino Nano       Arduino Mega
//GND                 GND              GND                GND
//VCC                 5V               5V                 5V
//MOSI                11               11                 51
//MISO                12               12                 50
//SCK                 13               13                 52
//SC                  4                4                  53

const int chipSelect = 4;    

void setup(){
   Serial.begin(9600);
   pinMode(SS, OUTPUT);

   // если карта не исправна, есть ошибка в подключении модуля - выводим сообщение
   while (!card.init(SPI_HALF_SPEED, chipSelect)) { Serial.println("initialization failed"); } 

   // определяем тип карты и выводим его в COM-порт
   Serial.print("\nCard type: ");
   switch(card.type()) {
     case SD_CARD_TYPE_SD1:
        Serial.println("SD1");
        break;
     case SD_CARD_TYPE_SD2:
        Serial.println("SD2");
        break;
     case SD_CARD_TYPE_SDHC:
        Serial.println("SDHC");
        break;
     default:
        Serial.println("Unknown");
   }
  
   // инициализация файловой системы
   if (!volume.init(card)) {
      Serial.println("Could not find FAT16/FAT32 partition.\nMake sure you've formatted the card");
      return;
   }

   // вычисляем размер первого раздела на карте
   uint32_t volumesize;
   Serial.print("\nVolume type is FAT");
   Serial.println(volume.fatType(), DEC);
   Serial.println();
  
   // вычисляем объем памяти карты в Кб и Мб
   volumesize = volume.blocksPerCluster();
   volumesize *= volume.clusterCount();
   volumesize *= 512;
 
   Serial.print("Volume size (Kbytes): ");
   volumesize /= 1024;
   Serial.println(volumesize);
 
   Serial.print("Volume size (Mbytes): ");
   volumesize /= 1024;
   Serial.println(volumesize);

   Serial.println("\nFiles found on the card (name, date and size in bytes): ");
   root.openRoot(volume);
   // выводим список файлов в COM-порт
   root.ls(LS_R | LS_DATE | LS_SIZE);
}

void loop(void) {
  
}
