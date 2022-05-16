#include <time.h> // Директива нужна для инициализации функции rand() 
#include <stdio.h> // Включаем поддержку функций ввода/вывода 
#include <stdlib.h> // А это — для поддержки функции rand() 
//int main(void) { 
int main(int argc,char **argv) {
 int num; 
 time_t t; 
 srand(time(&t)); 
 num = rand() % 10; 

 printf("Content-type: image/gif\n"); 
 printf("Pragma: no-cache\n"); 
 printf("\n"); 

 //printf("<!DOCTYPE html>"); 
 //printf("<html lang='ru'>"); 
 //printf("<head>"); 
 //printf("<title>Случайное число</title>"); 
 //printf("<meta charset='utf-8'>"); 
 //printf("</head>"); 
 //printf("<body>"); 
 //printf("<h1>Здравствуйте!</h1>"); 
 //printf("<p>Случайное число в диапазоне 0-9: %d</p>", num); 
 //printf("</body>"); 
 //printf("</html>"); 

  
}
