<?php

/*В массиве  А(N)  найти:
 * а)  число  элементов,  предшествующих  первому отрицательному элементу;
 * б) сумму нечетных элементов массива, следующих за последним отрицательным элементом.
 */

//Функция подсчета колличества элементов до первого вхождения отрицательного элемента
function countElBeforeNegativeEl(array $arr)
{   $count = 0;
    reset($arr);
    do {
        if (current($arr) < 0) {
            return $count;
        }
        $count++;
        next($arr);
    } while (key($arr));
    return "В массиве нет отрицательных чисел";
}

//Функция подсчета суммы нечетных элементов после вхождения последнего отрицательного элемента
function sumElAfterNegativeEl ($arr)
{
    $sum = 0;
    end($arr);
    do {
        if (current($arr)<0) {
            return $sum;
        }
        $sum += current($arr);
        prev($arr);
    } while (key($arr));
    return "В массиве нет отрицательных чисел";
}
$A = [-1, -5, -5, 2, 2 , 1];

echo "Число  элементов,  предшествующих  первому отрицательному элементу: ".countElBeforeNegativeEl($A)."\n";
echo "Сумма нечетных элементов массива, следующих за последним отрицательным элементом: ".sumElAfterNegativeEl($A);