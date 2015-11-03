<?php

require_once('./FizzBuzzCalc.php'); // FizzBuzzCalc.phpを読み込み

$fizzBuzz = new FizzBuzzCalc();

print_r($fizzBuzz->say(15));
