<?php

/*
  Напечатать  натуральное  число  N :
а)  в  двоичной  системе  счисления;
б)  в шестнадцатеричной системе счисления.
 */

//Функция перевода из десятичной в двоичную систему счисления
function binary (int $number) : int
{   $binaryNum = 0;
    $pow = 0; //показатель степени т.к. разрядность
    while ((int)($number)>0) {
        $binaryNum = ($number % 2) * 10**$pow + $binaryNum;
        $number = $number / 2;
        $pow++;
    }

    return $binaryNum;
}

//Функция перевода из десятичной в двоичную систему счисления
function hex(int $number) : string
{
    $hexNumber = "";
    $hexNums = [10=>"A" ,11=>"B", 12=> "C", 13=>"D", 14=>"E", 15=>"F"];
    while ((int)($number)>0) {
        $hexNumber = $number % 16 > 9 ? $hexNums[$number % 16].$hexNumber : ($number % 16).$hexNumber;
        $number = $number / 16;
        var_dump($hexNumber);
    }
    return $hexNumber;
}

$N = 2345; //Натуральное число

echo binary($N)."\n";
echo hex($N);