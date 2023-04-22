<?php

include_once "autoload.php";

class News
{
    static private $link=null;

    private $client = [];

    public $news;

    static public function createNews()
    {
        if (is_null(self::$link)) self::$link = new News;
        return self::$link;
    }

    public function addObserver($in)
    {
        $this->client[] = $in;
        return $this;
    }

    public function renameObserver($in)
    {
        foreach($this->client as $key=>$value)
            if ($in === $value) 
                unset($this->client[$key]);
    }

    public function outNews($text)
    {
        $this->news = $text;
        foreach($this->client as $value)
            $value->searchNews($this);
    }

}

class Observer
{
    private $objNews;

    private $news=null;

    public function __construct()
    {
        $this->objNews = News::createNews()->addObserver($this);
    }

    public function searchNews($in)
    {
        if ($in instanceof News)
            $this->news = $in->news;
    }

    public function getNews()
    {
        if (!is_null($this->news)) {
            echo "Получено новое сообщение: $this->news <br>";
            $this->news = null;
        } else {
            echo "Новых сообщений нет.<br>";
        }
    }

    public function renameNews()
    {
        $this->objNews->renameObserver($this);
    }

}

$news = News::createNews();



$client1 = new Observer;
$client2 = new Observer;
$client3 = new Observer;
$client4 = new Observer;
$client5 = new Observer;
$client6 = new Observer;

$client4->renameNews();

$news->outNews("Have a good day!");

$client2->renameNews();

$news->outNews("Have a good day!");

$client1->getNews();
$client2->getNews();
$client3->getNews();
$client4->getNews();
$client5->getNews();
$client6->getNews();

echo '<br><br><br><br>';
$news->outNews("Have a good evening!");

$client1->getNews();
$client2->getNews();
$client3->getNews();
$client4->getNews();
$client5->getNews();
$client6->getNews();
