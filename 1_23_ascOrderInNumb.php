<?php

/*
  Дано  целое  число  N.  Преобразовать  число  так, чтобы его цифры
следовали в порядке возрастания.
 */

//Функция сортировки цифр числа в порядке возрастания
function ascSortNumber(int $naturalNum): int
{
    $ascSort = $naturalNum % 10; //Переменная сортировки
    $naturalNum = $naturalNum/10;
    $pow = 0; //переменная степени т.к. работаем с разрядностью
    while ((int)($naturalNum) > 0) {
        // сравнение последней цифры числа с сортированным числом в разрядности сортированного числа
        if ($ascSort < ($naturalNum%10) * (10 ** $pow)) {
           $ascSort = ascSortNumber($ascSort * 10 + $naturalNum % 10);
        } else {
           $ascSort = $naturalNum % 10 * (10 ** ($pow+1)) + $ascSort;
        }
        $pow++;
        $naturalNum = $naturalNum / 10;
    }
    return $ascSort;
}

$N = 1945628; //Целое число

echo ascSortNumber($N);

