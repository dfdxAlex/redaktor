<?php



class classForTest
{
    public $ab=0;
    public $bc=0;
    public $ac=0;
    public $pl=0;

    public function __construct($ak=3,$bk=4,$ck=5)
    {
        $this->setABC($ak,$bk,$ck);
        $this->gipotenuza();
        $this->pl = $this->ab*$this->bc/2;
    }

    public function setABC($a=3,$b=4,$c=5)
    {
        $this->ab=$a;
        $this->bc=$b;
        $this->ac=$c;
    }

    public function gipotenuza()
    {
        $this->ac=sqrt($this->ab*$this->ab+$this->bc*$this->bc);
    }
}


$abc = new classForTest(6,2);



echo '<pre>';
var_dump($abc);
//echo $abc->sunABC();
echo '</pre>';
