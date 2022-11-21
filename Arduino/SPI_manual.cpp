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


void setup(){
   Serial.begin(9600); // инициализация мониторинга последовательного порта 

   SPI.begin();        // инициализация протокола SPI

   SPI.setBitOrder(LSBFIRST);   // установить порядок ввода-вывода данных, первый байт младший или старший 
                                //LSBFIRST-младший бит первый, 
                                // MSBFIRST - старший бит первый

   SPI.setClockDivider(SPI_CLOCK_DIV4);  // задает делитель частоты для шины относительно частоты контроллера. По умолчанию делитель установлен на 4
                                         //SPI_CLOCK_DIV2
                                         //SPI_CLOCK_DIV4
                                         //SPI_CLOCK_DIV8
                                         //SPI_CLOCK_DIV16
                                         //SPI_CLOCK_DIV32
                                         //SPI_CLOCK_DIV64
                                         //SPI_CLOCK_DIV128

    SPI.setDataMode(SPI_MODE0);          // Задает режим работы шины и фазы синхронизации
                                         //Режим          Уровень сигнала (CPOL)                Фаза (CPHA)
                                         //SPI_MODE0        0                                      0
                                         //SPI_MODE1        0                                      1
                                         //SPI_MODE2        1                                      0
                                         //SPI_MODE3        1                                      1

    SPI.transfer(0);    // передает или получает информацию с шины SPI

    

    for (int i=0; i<100; i++) {
        val=SPI.transfer(110);
        Serial.write(val);
        delay(500);
    }



   SPI.end();          // отключаем протокол SPI
}

void loop(void) {

}
