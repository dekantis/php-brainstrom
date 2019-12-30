<?php

/*Натуральное число N разложить на простые множители.*/

//Функция поиска простых множителей
function primeFactor(int $numb): int
{
    if ($numb == 1) {
        return 1;
    }
    for ($i=2; $i<=$numb/2; $i++){
        if ($numb % $i == 0) {
            return $i;
        }
    }
    return $numb;
}
$N = 3; //Натуральное число
$str = "$N : "; //Строка для наглядности вывода разложенного числа

while ($N>1) {
    $str .= primeFactor($N)." * ";
    $N /= primeFactor($N);
}
echo $str."1";