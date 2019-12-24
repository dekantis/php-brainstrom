<?php
/*
Даны  натуральные  числа  N  и  M.  Определить,  являются  ли  они  взаимно простыми числами.
Взаимно простые числа не имеют общих делителей, кроме единицы.
*/

//Функция определяющая являются ли числа взаимно простыми
function isCompareNumbs(int $numberOne, int $numberTwo): bool
{
    if ($numberOne == 1|| $numberTwo == 0) {
        return false;
    }
    //Переменная для итераций в меньшем числе
    $minNumber = $numberTwo - $numberOne > 0 ? $numberOne : $numberTwo;

    for ($i=2; $i<=$minNumber/2; $i++) {
        if ($numberTwo%$i == 0 && $numberOne%$i == 0) {
            return false;
        }
    }
    return true;

}

//Заданные натуральные числа
$N = 22;
$M = 54;

if(isCompareNumbs($N, $M)) {
    echo "Числа $N и $M являются взаимно простыми";
}