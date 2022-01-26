<?php
declare(strict_types=1);

namespace redaktor;

include 'class.php';

use redaktor\User;



$user = new User(1978);
$initbd = new initBd();
$instrument = new instrument();

echo $user->userName($initbd).'<br>';
echo $user->userMail($instrument).'<br>';
echo $user->userYear();
