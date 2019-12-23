<?php

/*Парными  простыми числами называются
два простых числа, разность  которых равна двум.
Например,  3 и 5; 11 и 13.
Найти 10  парных  простых чисел.  */

//Функция проверки числа на простое
function isSimple(int $numb): bool
{
    if($numb == 0 || $numb == 1) {
        return false;
    }
    for ($i=2;$i<=$numb/2;$i++) {//итерации до N/2
        if ($numb % $i == 0) {
            return false;
        }
    }
    return true;
}

$count = 0; //счетчик чисел
$number = 0; // старт поиска

    while ($count <10) {
        if (isSimple($number)&&isSimple($number+2)) {
            echo ($count+1).": ".($number+2)." ". $number. "\n";
            $count++;
            $number += 2;
        }
        $number++;
    }