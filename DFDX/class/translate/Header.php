<?php
namespace src\libraries;

class Header
{
    public function __toString()
    {
      return "
        <!DOCTYPE html>
        <html lang=\"en\">
        <head>
          <meta charset=\"UTF-8\">
          <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
          <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
          <title>Редактор классов</title>
          <link rel=\"stylesheet\" href=\"src/css/style.css\">
        </head>
        <body>
        ";
    }
}
