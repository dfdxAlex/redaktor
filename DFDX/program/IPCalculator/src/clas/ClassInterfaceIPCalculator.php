<?php
namespace program\IPCalculator\src\clas;

class ClassInterfaceIPCalculator
{
    public function __construct()
    {
    }

    public function interfaceIPCalculatorGroups()
    {
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////\\\
        $ContrlSession = new \program\IPCalculator\src\ValueObject\ControlSession();
        if ($ContrlSession->showUserMenu()) {
        // интерфейс выбора вычислений айпишников по группам А,B ...
        echo '<div class="interface-ip-calculator-div">
                  <form action="IPCalculator.php" method="post">
                      <p class="IP-Groups-p">Выбрать класс сети</p>
                      <div class="select-IP-Groups-div">
                      <select name="IP_From_Group" class="select-IP-Groups">
                          <option value="A">Класc A</option>
                          <option value="B">Класс B</option>
                          <option value="C">Класс C</option>
                          <option value="D">Класс D</option>
                          <option value="E">Класс E</option>
                      </select>
                      </div>
                      <input class="button-IP-Groups btn" name="button-IP-Groups" type="submit" value="Показать характеристики">
                  </form>
              </div>';
        } else if ($_SESSION['button-IP-Groups']=='A' || $_SESSION['button-IP-Groups']=='B'
                || $_SESSION['button-IP-Groups']=='C' || $_SESSION['button-IP-Groups']=='D'
                || $_SESSION['button-IP-Groups']=='E') {
            echo '<h3>Параметры сети класса '.$_SESSION['button-IP-Groups'].'</h3>
                  <p>Все адресное пространство занимает 32 бита. Записывается в десятичном виде и состоит из 4 однобайтовых чисел, разделенных точкой, однако компьютер их принимает как 32 бита одним значением.</p>';
            
            if ($_SESSION['button-IP-Groups']=='A') {
                echo '<div class="network-parameter">
                          <p>Сеть данного класса маркируется нулем в первом бите данного 32-битного числа.</p>
                          <p>Остальные 31 бит содержат информацию об адресе самой сети и о конкретном хосте(компьютере)</p>
                          <p>Адрес данной сети задается первым байтом, а так, как его первый бит занят нулем всегда, то для определения адреса остается 7 бит или 127 различных адресов.</p>
                          <p>Остальные 3 числа или 24 бита задают адрес хоста. Хостов в данной сети может быть 16 777 216</p>
                          <h4>Резюме:</h4>
                          <p>Число сетей типа A с адресами IPv4 может быть 127</p>
                          <p>Число хостов или пользователей в сети типа A с адресами IPv4 может быть 16 777 216</p>
                      </div>';

            }

            if ($_SESSION['button-IP-Groups']=='B') {
                echo '<div class="network-parameter">
                          <p>Сеть данного класса маркируется единицей и нулем в первых двух битах (10) данного 32-битного числа.</p>
                          <p>Остальные 30 бит содержат информацию об адресе самой сети и о конкретном хосте(компьютере)</p>
                          <p>Адрес данной сети задается первыми двумя байтами, а так, как его первые два бита заняты всегда, то для определения адреса остается 14 бит или 16 384 различных адресов.</p>
                          <p>Остальные 2 числа или 16 бит задают адрес хоста. Хостов в данной сети может быть 65 536</p>
                          <h4>Резюме:</h4>
                          <p>Число сетей типа B с адресами IPv4 может быть 16 384</p>
                          <p>Число хостов или пользователей в сети типа B с адресами IPv4 может быть 65 536</p>
                      </div>';

            }

            if ($_SESSION['button-IP-Groups']=='C') {
                echo '<div class="network-parameter">
                          <p>Сеть данного класса маркируется единицей, единицей и нулем в первых трех битах (110) данного 32-битного числа.</p>
                          <p>Остальные 29 бит содержат информацию об адресе самой сети и о конкретном хосте(компьютере)</p>
                          <p>Адрес данной сети задается первыми тремя байтами, а так, как его первые три бита заняты всегда, то для определения адреса остается 21 бит или 2 097 152 различных адресов.</p>
                          <p>Оставшееся 1 число или 8 бит задают адрес хоста. Хостов в данной сети может быть 256</p>
                          <h4>Резюме:</h4>
                          <p>Число сетей типа C с адресами IPv4 может быть 2 097 152</p>
                          <p>Число хостов или пользователей в сети типа C с адресами IPv4 может быть 256</p>
                      </div>';

            }

            if ($_SESSION['button-IP-Groups']=='D') {
                echo '<div class="network-parameter">
                          <p>Сеть данного класса маркируется единицей, единицей, единицей и нулем в первых четырех битах (1110) данного 32-битного числа.</p>
                          <p>Сеть находится в адресном пространстве 224.0.0.0-239.255.255.255</p>
                          <p>Используются адреса для многоадресной рассылки multicast</p>
                      </div>';

            }

            if ($_SESSION['button-IP-Groups']=='E') {
                echo '<div class="network-parameter">
                          <p>Сеть данного класса маркируется единицей, единицей, единицей и нулем в первых четырех битах (1111) данного 32-битного числа.</p>
                          <p>Сеть находится в адресном пространстве 240.0.0.0-255.255.255.255</p>
                          <p>Зарегистрированы для будущего использования</p>
                      </div>';

            }

            // показать кнопку сбросса
            echo '<div class="interface-ip-calculator-div">
                      <form action="IPCalculator.php" method="post">
                          <input class="button-IP-Groups btn" name="button-IP-Groups-reset" type="submit" value="Вернуться к выбору">
                      </form>
                  </div>';
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////\\\
    }

    public function interfaceIPCalculatorCIDR()
    {
        $ContrlSession = new \program\IPCalculator\src\ValueObject\ControlSession();
        if ($ContrlSession->showUserMenu()) {
            echo '<div class="IPV4-CIDR">
                     <form action="IPCalculator.php" method="post">
                         <h3>IPV4 CIDR</h3>
                         <p>IP адрес</p>
                         <input type="text" name="ipS1" placeholder="0" class="ipS">
                         <input type="text" name="ipS2" placeholder="0" class="ipS">
                         <input type="text" name="ipS3" placeholder="0" class="ipS">
                         <input type="text" name="ipS4" placeholder="0" class="ipS">
                         <span> / </span>
                         <input type="text" name="ipSmask" placeholder="0" class="ipS">
                         <input type="submit" name="ipSSIDR" value="Считаем" class="button-ipS btn">
                         <br><br>
                         <p>Маска сети в виде 4 байт</p>
                         <input type="text" name="mask1" placeholder="0" class="ipS">
                         <input type="text" name="mask2" placeholder="0" class="ipS">
                         <input type="text" name="mask3" placeholder="0" class="ipS">
                         <input type="text" name="mask4" placeholder="0" class="ipS">
                     </form>
                  </div>';
        } else if ($_SESSION['ipSSIDR']==0) {

            $this->mask4BytTo32Bit();
            
            echo '<p>Вы проверяете адрес: '.$this->ip().'</p>';

            echo '<p>Двоичная маска подсети: '.$this->maska2().'</p>';

            echo '<p>Десятичная маска подсети: '.$this->maska10($this->maska2()).'</p>';

            echo '<p>Адрес сети: '.$this->networkAddressByMaskAndIp($this->ip10To2($this->ip()),$this->maska2()).'</p>';

            echo '<p>Первый адрес в сети: '.$this->firstAddress($this->networkAddressByMaskAndIp($this->ip10To2($this->ip()),$this->maska2())).'</p>';

            echo '<p>Число хостов в сети: '.$this->numerHost().'<p>';

            echo '<p>Последний адрес в сети: '.$this->firstAddress($this->networkAddressByMaskAndIp($this->ip10To2($this->ip()),$this->maska2()),$this->numerHost()).'</p>';

            echo '<p>Широковещательный адрес в сети: '.$this->firstAddress($this->networkAddressByMaskAndIp($this->ip10To2($this->ip()),$this->maska2()),(1+$this->numerHost())).'</p>';
            
            echo '<form action="IPCalculator.php" method="post">
                      <input type="submit" name="ipSSIDRreset" value="Вернуться" class="button-ipS btn">
                  </form>';
        }
    }

    // функция уточняет содержимое переменной $_SESSION['ipMask']
    // которая в свое время содержит маску в виде одного числа, числа битов
    // если значение переменной равно нулю, а все вычисления привязаны к ней
    // то преобразовать маску из вида 4-х байтового десятичного в вид числа битов адреса
    function mask4BytTo32Bit()
    {
        if ($_SESSION['ipMask']!=0) return;

        $nomer=$this->ip10To2($this->mask10());
        $i=0;
        while (substr($nomer, $i, 1)=='1') {
            $i++;
        }
        $_SESSION['ipMask']=$i;
    }

    // функция возвращает IP адрес, создавая его из переменных сессий
    function ip()
    {
        return $_SESSION['ip1'].'.'.$_SESSION['ip2'].'.'.$_SESSION['ip3'].'.'.$_SESSION['ip4'];
    }

    // функция возвращает маску в десятичном виде, создавая его из переменных сессий
    function mask10()
    {
        return $_SESSION['mask1'].'.'.$_SESSION['mask2'].'.'.$_SESSION['mask3'].'.'.$_SESSION['mask4'];
    }

    // двоичное представление маски подсети возвращает
    function maska2()
    {
        $maska='';
        $ii=$_SESSION['ipMask'];
        for ($i=1; $i<33; $i++) {
            if ($ii>0) $maska.='1'; else $maska.='0';
            if ($i==8 || $i==16 || $i==24) $maska.=' ';
            $ii--;
        }
        return $maska;
    }

    // десятичное представление маски подсети
    // если функции дать IP адрес представленный строкой в двоичном виде, то она вернет строку IP в десятичном виде
    function maska10($nomer2)
    {
        $maska='';
        $nomer=0;
        $nomer2=str_replace(' ','',$nomer2);
        for ($i=1; $i<33; $i++) {
            if (substr($nomer2,$i-1,1)=='1') {
                $nomer=$nomer+$this->bit($i);
            }
            if ($i==8) {
                $maska=$nomer;$nomer=0;
            }
            if ($i==16 || $i==24 || $i==32) {
                $maska.='.'.$nomer;$nomer=0;
            }
        }
        return $maska;
    }

    // функция возвращает вес бита
    function bit($nomer)
    {
        while($nomer>8) {
            $nomer=$nomer-8;
        }
         return match ($nomer) {
             8=>1,
             7=>2,
             6=>4,
             5=>8,
             4=>16,
             3=>32,
             2=>64,
             1=>128,
         };
    }
    
    // функция возвращает вес бита за 32 разряда
    function bit32($nomer)
        {
             return match ($nomer) {
                 32=>1,
                 31=>2,
                 30=>4,
                 29=>8,
                 28=>16,
                 27=>32,
                 26=>64,
                 25=>128,
                 24=>256,
                 23=>512,
                 22=>1024,
                 21=>2048,
                 20=>4096,
                 19=>8192,
                 18=>16384,
                 17=>32768,
                 16=>65536,
                 15=>131072,
                 14=>262144,
                 13=>524288,
                 12=>1048576,
                 11=>2097152,
                 10=>4194304,
                 9=>8388608,
                 8=>16777216,
                 7=>33554432,
                 6=>67108864,
                 5=>134217728,
                 4=>268435456,
                 3=>536870912,
                 2=>1073741824,
                 1=>2147483648,

             };
        }

    // функция узнает адрес сети по маске и IP адресу хоста
    function networkAddressByMaskAndIp($ip,$mask)
    {
         $ip=str_replace(' ','',$ip);
         $mask=str_replace(' ','',$mask);
         $adres='';
         for ($i=1; $i<33; $i++) {
             if (substr($ip,$i-1,1)=='1' && substr($mask,$i-1,1)=='1') $adres.='1'; else $adres.='0';
         }
         return $this->maska10($adres);
    }

    // функция переводит десятичный вил IP адреса или маски в двоичный
    // входной параметр типа 111.111.111.111
    function ip10To2($nomer2) {
        $masIp=preg_split ('/\./',$nomer2);
        $rez=$this->nomer10to2((int)$masIp[0]).$this->nomer10to2((int)$masIp[1]).$this->nomer10to2((int)$masIp[2]).$this->nomer10to2((int)$masIp[3]);
        return $rez;
    }

    // функция перевода десятичного числа в двоичное (1 байт)
    // $positions=8 определяет сколько знаков должно быть в выходном числе, недостающие заполнятся нулями
    function nomer10to2($nomer, $positions=8)
    {
        $job=true;
        $nomerJob=$nomer;
        $rez='';

        // преобразовываем из десятичного в двоичный делением на 2
        while($job) {
            $rez.=$nomerJob % 2;
            $nomerJob=intdiv($nomerJob,2);
            if ($nomerJob<2) {
                $rez.=$nomerJob;
                $job=false;
            } 
        }
        // зеркально разворачиваем строку
        $rez=strrev($rez);
        // заполняем нулями недостающие позиции
        while(strlen($rez)<$positions) {
            $rez='0'.$rez;
        }
        return $rez;
    }

    // Функция возвращает первый доступный адрес хоста добавляя единицу к адресу сети если не подавать число хостов
    // если подать в переменную $hostov число хостов в сети, то получим последний адрес сети
    function firstAddress($adsress, $hostov=1)
    {
        $address2=$this->ip10To2($adsress);
        $nomer=0;

        // переводим двоичный адрес в десятичный, чтобы добавить единицу
        for ($i=1; $i<33; $i++) {
             if (substr($address2,$i-1,1)=='1') $nomer+=$this->bit32($i);
        }
        if ($nomer>4294967294) return 'В этой сети нет свободных адресов:)';

        // добавляем единицу - это будет первый адрес в сети
        $nomer=$nomer+$hostov;

        return $this->maska10($this->nomer10to2($nomer, 32));

    }

    // функция возвращает число хостов в сети, отнимая от 32-х число битов, выделенных под адрес сети
    function numerHost()
    {
        $power=32-$_SESSION['ipMask'];
        $power=pow(2, $power);
        $power-=2;
        return $power;
    }
}
