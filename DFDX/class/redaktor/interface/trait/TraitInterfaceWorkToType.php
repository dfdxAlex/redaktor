<?php
namespace class\redaktor\interface\trait;

trait TraitInterfaceWorkToType
{
    //interface InterfaceWorkToType

    public function translitUnicodToCirilCompact($string)
    { 
        $strRez=$string;
        $masCod = array();
        // набирается массив с декодирующими данными
        for ($i=40; $i<56; $i++) {
            $j=$i;
            if ($i==50) $j='4a';
            if ($i==51) $j='Ab';
            if ($i==52) $j='4c';
            if ($i==53) $j='4d';
            if ($i==54) $j='4e';
            if ($i==55) $j='4f';
            $masCod["u0{$j}0"]="&#x{$j}0";
            $masCod["u0{$j}1"]="&#x{$j}1";
            $masCod["u0{$j}2"]="&#x{$j}2";
            $masCod["u0{$j}3"]="&#x{$j}3";
            $masCod["u0{$j}4"]="&#x{$j}4";
            $masCod["u0{$j}5"]="&#x{$j}5";
            $masCod["u0{$j}6"]="&#x{$j}6";
            $masCod["u0{$j}7"]="&#x{$j}7";
            $masCod["u0{$j}8"]="&#x{$j}8";
            $masCod["u0{$j}9"]="&#x{$j}9";
            $masCod["u0{$j}a"]="&#x{$j}a";
            $masCod["u0{$j}b"]="&#x{$j}b";
            $masCod["u0{$j}c"]="&#x{$j}c";
            $masCod["u0{$j}d"]="&#x{$j}d";
            $masCod["u0{$j}e"]="&#x{$j}e";
            $masCod["u0{$j}f"]="&#x{$j}f";
        }

        foreach($masCod as $key=>$value) {
            $strRez=str_replace($key,$value,$strRez);
        }
        return $strRez;
    }

    public function translit($string)
    {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '',  'ы' => 'y',   'ъ' => '',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );

    $stroka=preg_filter('/[\c\s\d\W]/u','-',$string);
    $stroka=strtr($stroka, $converter);
    $stroka=mb_strtolower($stroka);
    if (!is_null(preg_filter('/-{2,9}?/','',$stroka))) $stroka=preg_filter('/-{2,9999}?/','',$stroka);
    return $stroka;
   }

    public function proverkaMassiwa($mas,$slowo)
    {
      foreach($mas as $value)
        if ($value==$slowo) 
            return true;
      return false;
    }

    public function clearCode($cod,...$parametr) 
    {
         //разрешенные теги
         //Функция выводит очищенную строку с кодом, либо список допустимых тегов
         //Если есть входящий параметр список_тегов_строка, то список вернется одной строкой (значение по умолчанию)
         //Если есть входящий параметр список_тегов_столбец, то список вернется одной строкой разделенное тегами <br>
         //Чтобы функция вернула преобразованный текст, следует задать параметр 'текст' (по умолчанию)
         //Чтобы получить список разрешенных тегов, необходимо задать параметр 'список'
         //Чтобы удалить ВСЕ теги нужен параметр удалить_все
 
         $spisokPlusBr=false;
         $listTegow='';
         $vivod=true;
         $udalitVse=false;
       
         foreach($parametr as $value) {
           if ($value=='список_тегов_столбец')
             $spisokPlusBr=true;
 
         //foreach($parametr as $value)
           if ($value=='список')
             $vivod=false;
 
         //foreach($parametr as $value)
           if ($value=='удалить_все')
             $udalitVse=true;
         }
 
         if ($udalitVse) // Если команда Удалить Все теги
             $cod=preg_replace('/>|</','',$cod); // Удалить лишнее
 
         if (!$udalitVse) {// Если нет команды Удалить Все теги
          
             $cod=preg_replace('/<</','[less]',$cod); 
             $cod=preg_replace('/>>/','[more]',$cod); 

             $cod=preg_replace('/</','&lt',$cod); // Удалить лишнее
             $cod=preg_replace('/<\?php/','&lt?php',$cod); // Заменить открывающий тег php на нарисованный
             $cod=preg_replace('/>/','&gt',$cod); // 
             $cod=preg_replace('/class/','',$cod); // Удалить лишнее
             $cod=preg_replace('/"&gt/','">',$cod); // вернуть кавычку с закрытым тегом
             $cod=preg_replace('/&ltp&gt/','<p>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/p&gt/','</p>',$cod); // Удалить лишнее

             $listTegow=$listTegow.'&ltp&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lth1&gt/','<h1>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/h1&gt/','</h1>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lth1&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lth2&gt/','<h2>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/h2&gt/','</h2>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lth2&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lth3&gt/','<h3>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/h3&gt/','</h3>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lth3&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lth4&gt/','<h4>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/h4&gt/','</h4>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lth4&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lth5&gt/','<h5>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/h5&gt/','</h5>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lth5&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lth6&gt/','<h6>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/h6&gt/','</h6>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lth6&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lti&gt/','<i>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/i&gt/','</i>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&lti&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltfont&gt/','<font>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/font&gt/','</font>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltfont&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltbr&gt/','<br>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/br&gt/','</br>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltbr&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltacronym&gt/','<acronym>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/acronym&gt/','</acronym>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltacronym&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltabbr&gt/','<abbr>',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/abbr&gt/','</abbr>',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltabbr&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lta\s/','<a ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/a&gt/','</a>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&lta&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltu&gt/','<u> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/u&gt/','</u>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltu&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lttt&gt/','<tt> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/tt&gt/','</tt>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&lttt&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltsup&gt/','<sup> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/sup&gt/','</sup>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltsup&gt ';

             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltsub&gt/','<sub> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/sub&gt/','</sub>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltsub&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltstrong&gt/','<strong> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/strong&gt/','</strong>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltstrong&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltstrike&gt/','<strike> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/strike&gt/','</strike>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltstrike&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltspan&gt/','<span> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/span&gt/','</span>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltspan&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltsmall&gt/','<small> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/small&gt/','</small>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltsmall&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltsamp&gt/','<samp> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/samp&gt/','</samp>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltsamp&gt ';
             
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&lts&gt/','<s> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/s&gt/','</s>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&lts&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltq&gt/','<q> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/q&gt/','</q>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltq&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltkbd&gt/','<kbd> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/kbd&gt/','</kbd>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltkbd&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltem&gt/','<em> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/em&gt/','</em>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltem&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltdfn&gt/','<dfn> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/dfn&gt/','</dfn>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltdfn&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltcode&gt/','<code> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/code&gt/','</code>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltcode&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltcite&gt/','<cite> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/cite&gt/','</cite>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltcite&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltbig&gt/','<big> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/big&gt/','</big>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltbig&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltb&gt/','<b> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/b&gt/','</b>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltb&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltiframe/','<iframe',$cod); // Удалить лишнее
             $cod=preg_replace('/&gt&lt\/iframe&gt/','></iframe>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltiframe&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';  // переработка и разрешение тегов <br /> в <br>
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltbr/','<br',$cod); // Удалить лишнее
             $cod=preg_replace('/\s\/&gt/','>',$cod); // Вернуть закрытый тег
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltdiv&gt/','<div> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/div&gt/','</div>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltdiv&gt ';

             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltaddress&gt/','<address> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/address&gt/','</address>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltaddress&gt ';

             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltins&gt/','<ins> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/ins&gt/','</ins>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltins&gt ';

             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltdel&gt/','<del> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/del&gt/','</del>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltdel&gt ';

             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltli&gt/','<li> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/li&gt/','</li>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltli&gt ';

             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltol&gt/','<ol> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/ol&gt/','</ol>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltol&gt ';

             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltul&gt/','<ul> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/ul&gt/','</ul>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltul&gt ';

             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltdl&gt/','<dl> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/dl&gt/','</dl>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltdl&gt ';

             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltdd&gt/','<dd> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/dd&gt/','</dd>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltdd&gt ';

             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltdd&gt/','<dd> ',$cod); // Удалить лишнее
             $cod=preg_replace('/&lt\/dd&gt/','</dd>',$cod); // Вернуть закрытый тег
             $listTegow=$listTegow.'&ltdd&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltimg/','<img ',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltimg&gt ';
 
             if (!$spisokPlusBr) 
                 $listTegow=$listTegow.',';
             if ($spisokPlusBr) 
                 $listTegow=$listTegow.'<br>';
             $cod=preg_replace('/&ltpre/','<pre ',$cod); // Удалить лишнее
             $listTegow=$listTegow.'&ltpre&gt ';
          }
 
         if ($vivod) 
             return $cod;
         if (!$vivod) 
             return $listTegow;
    }

public function tegAllowed($teg)
{
    return match ($teg) {
    '!DOCTYPE'=>"Объявляет тип документа и предоставляет основную информацию для браузера — его язык и версия.",
           'a'=>"Создаёт гипертекстовые ссылки.",
        'abbr'=>"Определяет текст как аббревиатуру или акроним. Поясняющий текст задаётся с помощью атрибута title.",
     'address'=>"Задает контактные данные автора/владельца документа или статьи. Отображается в браузере курсивом.",
        'area'=>"Представляет собой гиперссылку с текстом, соответствующей определенной области на карте-изображении или активную область внутри карты-изображения. Всегда вложен внутрь элемента <map>.",
     'article'=>"Раздел контента, который образует независимую часть документа или сайта, например, статья в журнале, запись в блоге, комментарий.",
       'aside'=>"Представляет контент страницы, который имеет косвенное отношение к основному контенту страницы/сайта.",
       'audio'=>"Загружает звуковой контент на веб-страницу.",
           'b'=>"Задает полужирное начертание отрывка текста, не придавая акцент или важность выделенному.",
        'base'=>"Задает базовый адрес (URL), относительно которого вычисляются все относительные адреса. Это поможет избежать проблем при переносе страницы в другое место, так как все ссылки будут работать, как и прежде.",
         'bdi'=>"Изолирует отрывок текста, написанный на языке, в котором чтение текста происходит справа налево, от остального текста.",
         'bdo'=>"Отображает текст в направлении, указанном в атрибуте dir, переопределяя текущее направление написания текста.",
  'blockquote'=>"Выделяет текст как цитату, применяется для описания больших цитат.",
        'body'=>"Представляет тело документа (содержимое, не относящееся к метаданным документа).",
          'br'=>"Перенос текста на новую строку.",
      'button'=>"Создает интерактивную кнопку. Элемент может содержать текст или изображение.",
      'canvas'=>"Холст-контейнер для динамического отображения изображений, таких как простые изображения, диаграммы, графики и т.п. Для рисования используется скриптовый язык JavaScript.",
     'caption'=>"Добавляет подпись к таблице. Вставляется сразу после открывающего тега <table>.",
        'cite'=>"Используется для указания источника цитирования. Отображается курсивом.",
        'code'=>"Представляет фрагмент программного кода, отображается шрифтом семейства monospace.",
         'col'=>"Выбирает для форматирования один или несколько столбцов таблицы, не содержащих информацию одного типа.",
    'colgroup'=>"Создает структурную группу столбцов, выделяющую множество логически однородных ячеек.",
        'data'=>"Элемент используется для связывания значения атрибута value, которое представлено в машиночитаемом формате и может быть обработано компьютером, с содержимым элемента.",
    'datalist'=>"Элемент-контейнер для выпадающего списка элемента <input>. Варианты значений помещаются в элементы <option>.",
          'dd'=>"Используется для описания термина из элемента <dt>.",
         'del'=>"Помечает текст как удаленный, перечёркивая его.",
     'details'=>"Создаёт интерактивный виджет, который пользователь может открыть или закрыть. Представляет собой контейнер для контента, видимый заголовок виджета помещается в элемент <summary>.",
         'dfn'=>"Определяет слово как термин, выделяя его курсивом. Текст, идущий следом, должен содержать расшифровку этого термина.",
      'dialog'=>"Интерактивный элемент, с которым взаимодействует пользователь для выполнения задачи, например, диалоговое окно, инспектор или окно. Без атрибута open не виден для пользователя.",
         'div'=>"Элемент-контейнер для разделов HTML-документа. Используется для группировки блочных элементов с целью форматирования стилями.",
          'dl'=>"Элемент-контейнер, внутри которого находятся термин и его описание.",
          'dt'=>"Используется для задания термина.",
          'em'=>"Выделяет важные фрагменты текста, отображая их курсивом.",
       'embed'=>"Элемент-контейнер для встраивания внешнего интерактивного контента или плагина.",
    'fieldset'=>"Группирует связанные элементы в форме, рисуя рамку вокруг них.",
  'figcaption'=>"Заголовок/подпись для элемента <figure>.",
      'figure'=>"Самодостаточный элемент-контейнер для такого контента как иллюстрации, диаграммы, фотографии, примеры кода, обычно с подписью.",
      'footer'=>"Определяет завершающую область (нижний колонтитул) документа или раздела.",
        'form'=>"Форма для сбора и отправки на сервер информации от пользователей. Не работает без атрибута action.",
          'h1'=>"Создают заголовки шести уровней для связанных с ними разделов.",
          'h2'=>"Создают заголовки шести уровней для связанных с ними разделов.",
          'h3'=>"Создают заголовки шести уровней для связанных с ними разделов.",
          'h4'=>"Создают заголовки шести уровней для связанных с ними разделов.",
          'h5'=>"Создают заголовки шести уровней для связанных с ними разделов.",
          'h6'=>"Создают заголовки шести уровней для связанных с ними разделов.",
        'head'=>"Элемент-контейнер для метаданных HTML-документа, таких как <title>, <meta>, <script>, <link>, <style>.",
      'header'=>"Секция для вводной информации сайта или группы навигационных ссылок. Может содержать один или несколько заголовков, логотип, информацию об авторе.",
          'hr'=>"Горизонтальная линия для тематического разделения параграфов.",
        'html'=>"Корневой элемент HTML-документа. Сообщает браузеру, что это HTML-документ. Является контейнером для всех остальных html-элементов.",
           'i'=>"Выделяет отрывок текста курсивом, не придавая ему дополнительный акцент.",
      'iframe'=>"Создает встроенный фрейм, загружая в текущий HTML-документ другой документ.",
         'img'=>"Встраивает изображения в HTML-документ с помощью атрибута src, значением которого является адрес встраиваемого изображения.",
       'input'=>"Создает многофункциональные поля формы, в которые пользователь может вводить данные.",
         'ins'=>"Выделяет текст подчеркиванием. Применяется для выделения изменений, вносимых в документ.",
         'kbd'=>"Выделяет текст, который должен быть введён пользователем с клавиатуры, шрифтом семейства monospace.",
       'label'=>"Добавляет текстовую метку для элемента <input>.",
      'legend'=>"Заголовок элементов формы, сгруппированных с помощью элемента <fieldset>.",
          'li'=>"Элемент маркированного или нумерованного списка.",
        'link'=>"Определяет отношения между документом и внешним ресурсом. Также используется для подключения внешних таблиц стилей.",
        'main'=>"Контейнер для основного уникального содержимого документа. На одной странице должно быть не более одного элемента <main>.",
         'map'=>"Создаёт активные области на карте-изображении. Является контейнером для элементов <area>.",
        'mark'=>"Выделяет фрагменты текста, помечая их желтым фоном.",
        'meta'=>"Используется для хранения дополнительной информации о странице. Эту информацию используют браузеры для обработки страницы, а поисковые системы — для ее индексации. В блоке <head> может быть несколько элементов <meta>, так как в зависимости от используемых атрибутов они несут разную информацию.",
       'meter'=>"Индикатор измерения в заданном диапазоне.",
         'nav'=>"Раздел документа, содержащий навигационные ссылки по сайту.",
    'noscript'=>"Определяет секцию, не поддерживающую сценарий (скрипт).",
      'object'=>"Контейнер для встраивания мультимедиа (например, аудио, видео, Java-апплеты, ActiveX, PDF и Flash). Также можно вставить другую веб-страницу в текущий HTML-документ. Для передачи параметров встраиваемого плагина используется элемент <param>.",
          'ol'=>"Упорядоченный нумерованный список. Нумерация может быть числовая или алфавитная.",
    'optgroup'=>"Контейнер с заголовком для группы элементов <option>.",
      'option'=>"Определяет вариант/опцию для выбора в раскрывающемся списке <select>, <optgroup> или <datalist>.",
      'output'=>"Поле для вывода результата вычисления, рассчитанного с помощью скрипта.",
           'p'=>"Параграфы в тексте.",
       'param'=>"Определяет параметры для плагинов, встраиваемых с помощью элемента <object>.",
     'picture'=>"Элемент-контейнер, содержащий один элемент <img> и ноль или несколько элементов <source>. Сам по себе ничего не отображает. Дает возможность браузеру выбирать наиболее подходящее изображение.",
         'pre'=>"Выводит текст без форматирования, с сохранением пробелов и переносов текста. Может быть использован для отображения компьютерного кода, сообщения электронной почты и т.д.",
    'progress'=>"Индикатор выполнения задачи любого рода.",
           'q'=>"Определяет краткую цитату.",
        'ruby'=>"Контейнер для Восточно-Азиатских символов и их расшифровки.",
          'rb'=>"Определяет вложенный в него текст как базовый компонент аннотации.",
          'rt'=>"Добавляет краткую характеристику сверху или снизу от символов, заключенных в элементе <ruby>, выводится уменьшенным шрифтом.",
         'rtc'=>"Отмечает вложенный в него текст как дополнительную аннотацию.",
          'rp'=>"Выводит альтернативный текст в случае если браузер не поддерживает элемент <ruby>.",
           's'=>"Отображает текст, не являющийся актуальным, перечеркнутым.",
        'samp'=>"Используется для вывода текста, представляющего результат выполнения программного кода или скрипта, а также системные сообщения. Отображается моноширинным шрифтом.",
     'section'=>"Определяет логическую область (раздел) страницы, обычно с заголовком.",
      'select'=>"Элемент управления, позволяющий выбирать значения из предложенного множества. Варианты значений помещаются в <option>.",
       'small'=>"Отображает текст шрифтом меньшего размера.",
      'source'=>"Указывает местоположение и тип альтернативных медиаресурсов для элементов <picture>, <video>, <audio>.",
        'span'=>"Контейнер для строчных элементов. Можно использовать для форматирования отрывков текста, например, выделения цветом отдельных слов.",
      'strong'=>"Расставляет акценты в тексте, выделяя полужирным.",
       'style'=>"Подключает встраиваемые таблицы стилей.",
         'sub'=>"Задает подстрочное написание символов, например, индекса элемента в химических формулах.",
     'summary'=>"Создаёт видимый заголовок для элемента <details>. Отображается с закрашенным треугольником, кликнув по которому можно просмотреть подробности заголовка.",
         'sup'=>"Задает надстрочное написание символов.",
       'table'=>"Элемент для создания таблицы.",
       'tbody'=>"Определяет тело таблицы.",
          'td'=>"Создает ячейку таблицы.",
    'template'=>"Используется для объявления фрагментов HTML-кода, которые могут быть клонированы и вставлены в документ скриптом. Содержимое элемента не является его дочерним элементом.",
    'textarea'=>"Создает большие поля для ввода текста.",
       'tfoot'=>"Определяет нижний колонтитул таблицы.",
          'th'=>"Создает заголовок ячейки таблицы.",
       'thead'=>"Определяет заголовок таблицы.",
        'time'=>"Определяет дату/время.",
       'title'=>"Заголовок HTML-документа, отображаемый в верхней части строки заголовка браузера. Также может отображаться в результатах поиска, поэтому это следует принимать во внимание предоставление названия.",
          'tr'=>"Создает строку таблицы.",
       'track'=>"Добавляет субтитры для элементов <audio> и <video>.",
           'u'=>"Выделяет отрывок текста подчёркиванием, без дополнительного акцента.",
          'ul'=>"Создает маркированный список.",
         'var'=>"Выделяет переменные из программ, отображая их курсивом.",
       'video'=>"Добавляет на страницу видео-файлы. Поддерживает 3 видео формата: MP4, WebM, Ogg.",
         'wbr'=>"Указывает браузеру возможное место разрыва длинной строки.",
       default=>false,
    };

}

  //interface InterfaceWorkToType
  public function trueFalseNull($param)
  {
    if ($param===true) return 'True';
    if ($param===false) return 'False';
    if (is_null($param)) return 'NULL';
    return false;
  }

   //interface InterfaceWorkToType
   public function notFalseAndNULL($data):bool
   {
     if ($data===false) return false;
     if (is_null($data)) return false;
     if (!isset($data)) return false;
     return true;
   }
   
   //interface InterfaceWorkToType
   public function printMas($mas)
   {
      if (!isset($mas)) {
            echo 'Переменная не существует';
            return;
       }
      if ($this->trueFalseNull($mas)!==false) 
            echo $this->trueFalseNull($mas);
      if (gettype($mas)=='unknown type') {
            echo 'Неопределенный тип переменной';
            return;
       }
      if (gettype($mas)=='object') {
            echo 'Входной параметр тира "object"';
            return;
       }
      if (gettype($mas)=='resource') {
            echo 'Входной параметр тира "resource"';
            return;
       }
      if (gettype($mas)=='string') {
            echo 'Тип "string": '.$mas;
            return;
       }
      if (gettype($mas)=='double') {
            echo 'Тип "double или float": '.$mas;
            return;
       }
      if (gettype($mas)=='integer') {
            echo 'Тип "integer": '.$mas;
            return;
       }
      $masZero=true; // если не будет ни одного входа, то считать массив пустым
      if (gettype($mas)=='array') { 
          foreach ($mas as $index2 => $mas2) {
             $masZero=false;
             if ($this->trueFalseNull($mas2)!==false) 
                echo '['.$index2.']='.$this->trueFalseNull($mas2);
             if (gettype($mas2)=='string' || gettype($mas2)=='double' || gettype($mas2)=='integer') 
                echo '['.$index2.']='.$mas2;

             if (gettype($mas2)=='array')
              foreach ($mas2 as $index3 => $mas3) {
                  if ($this->trueFalseNull($mas3)!==false) 
                      echo '['.$index2.']['.$index3.']='.$this->trueFalseNull($mas3);
                  if (gettype($mas3)=='string' || gettype($mas3)=='double' || gettype($mas3)=='integer') 
                      echo '['.$index2.']['.$index3.']='.$mas3;

                  if (gettype($mas3)=='array')
                    foreach ($mas3 as $index4 => $mas4) {
                       if ($this->trueFalseNull($mas4)!==false) 
                          echo '['.$index2.']['.$index3.']['.$index4.']='.$this->trueFalseNull($mas4);
                       if (gettype($mas4)=='string' || gettype($mas4)=='double' || gettype($mas4)=='integer') 
                          echo '['.$index2.']['.$index3.']['.$index4.']='.$mas4;

                       if (gettype($mas4)=='array')
                        foreach ($mas4 as $index5 => $mas5) {
                          if ($this->trueFalseNull($mas5)!==false) 
                              echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']='.$this->trueFalseNull($mas5);
                          if (gettype($mas5)=='string' || gettype($mas5)=='double' || gettype($mas5)=='integer') 
                              echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']='.$mas5;

                          if (gettype($mas5)=='array')
                            foreach ($mas5 as $index6 => $mas6)  {
                              if ($this->trueFalseNull($mas6)!==false) 
                                  echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']='.$this->trueFalseNull($mas6);
                              if (gettype($mas6)=='string' || gettype($mas6)=='double' || gettype($mas6)=='integer') 
                                  echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']='.$mas6;
                              
                              if (gettype($mas6)=='array')
                                foreach ($mas6 as $index7 => $mas7) {
                                  if ($this->trueFalseNull($mas7)!==false) 
                                      echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']='.$this->trueFalseNull($mas7);
                                  if (gettype($mas7)=='string' || gettype($mas7)=='double' || gettype($mas7)=='integer') 
                                      echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']='.$mas7;

                                  if (gettype($mas7)=='array')
                                    foreach ($mas7 as $index8 => $mas8) {
                                        if ($this->trueFalseNull($mas8)!==false) 
                                            echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']['.$index8.']='.$this->trueFalseNull($mas8);
                                        if (gettype($mas8)=='string' || gettype($mas8)=='double' || gettype($mas8)=='integer') 
                                            echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']['.$index8.']='.$mas8;

                                        if (gettype($mas8)=='array')
                                          foreach ($mas8 as $index9 => $mas9) {
                                              if ($this->trueFalseNull($mas9)!==false) 
                                                  echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']['.$index8.']['.$index9.']='.$this->trueFalseNull($mas9);
                                              if (gettype($mas9)=='string' || gettype($mas9)=='double' || gettype($mas9)=='integer') 
                                                  echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']['.$index8.']['.$index9.']='.$mas9;

                                              if (gettype($mas9)=='array')
                                                 foreach ($mas9 as $index10 => $mas10) {
                                                    if ($this->trueFalseNull($mas10)!==false) 
                                                        echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']['.$index8.']['.$index9.']['.$index10.']='.$this->trueFalseNull($mas10);
                                                    if (gettype($mas10)=='string' || gettype($mas10)=='double' || gettype($mas10)=='integer') 
                                                        echo '['.$index2.']['.$index3.']['.$index4.']['.$index5.']['.$index6.']['.$index7.']['.$index8.']['.$index9.']['.$index10.']='.$mas10;

                                                    if (gettype($mas10)=='array') 
                                                        echo 'Массив глубже 9-ти мерного';
                                                    echo '<br>';
                                                  }
                                             echo '<br>';
                                            }
                                        echo '<br>';
                                      }
                                      echo '<br>';
                                  }
                                  echo '<br>';
                             }
                             echo '<br>';
                         }
                         echo '<br>';
                     }
                     echo '<br>';
                }
                echo '<br>';
           }
           echo '<br>';
       }
      echo '<br>';
      if (gettype($mas)=='array' && $masZero) 
          echo 'Массив пуст';
   }
}
