<?php
declare(strict_types=1);

namespace redaktor;

include 'class.php';

use redaktor\User;



$user = new User(1978);
$user2 = new User(1111);
$initbd = new initBd();
$instrument = new instrument();

User::$day='Статик';

echo $user->userName($initbd).'<br>';
echo $user->userMail($instrument).'<br>';
echo $user->userYear().'<br>';
echo $user->getDay().'<br>';
echo $user2->getDay().'<br>';
echo $user->otTrait().'<br>';
