<?php
namespace class\redaktor\interface\interface;

// интерфейс для функций, работающих с поиском
// interfejs dla funkcji współpracujących z wyszukiwaniem
// interface for functions that work with search

interface InterfaceWorkToSearch extends InterfaceWorkToMenu
{
  // Функция поиска статьи по слову, возвращает массив с ID найденных статей
  // Funkcja wyszukiwania artykułu po słowie, zwraca tablicę z identyfikatorem znalezionych artykułów
  // Function to search for an article by a word, returns an array with the ID of the articles found
  public function poiskStati($nametablic,$slowo,&$masRezult=array(),...$data);
}
