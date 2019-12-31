<?php
/*
Для  каждого  числа  заданной  последовательности  натуральных   чисел
n0 ,n1,...,nm установить,  можно  ли  вычеркнуть  в  нем  некоторые  цифры,
чтобы сумма оставшихся равнялась заданному числу к.
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
//поиск нужной суммы
function searchSum(int $numberCL, int $numberOfSum) : int
{
    $number = $numberCL;
    $lastNum = $number % 10;
    $sumOfNums = $lastNum;
    $number = (int)($number / 10);
    $resultNum = $lastNum;
    while ($number>0) {
        if ($sumOfNums + $number % 10 > $numberOfSum) {
            $number = (int)($number / 10);
            continue;
        }
        $sumOfNums += $number % 10;
        if ($sumOfNums == $numberOfSum) {
            return $resultNum * 10 + $number % 10;
        }
        $resultNum = $resultNum * 10 + $number % 10;
        $number = (int)($number/10);
    }
    return (int)($numberCL / 10) > 10 ?
        searchSum((int)($numberCL/10), $numberOfSum) :
        0;
}

//Поиск цифры в числе
function NumInResultNumber(int $numb, int $Num): int
{
    $result = 0;
    $pow = 0;
    while ($numb>0) {
        if ($numb % 10 == $Num) {
            $result += (int)($numb / 10) * (10**($pow));
            break;
       }
        $result += ($numb % 10)*(10**$pow);
        $pow++;
        $numb = (int)($numb / 10);
    }
    return $result;
}

//функция сборки конечного числа
function buildNumb(int $numb, int $numsOfSum) : int
{
    $pow = 0;
    $resultNumber = 0;

//поиск цифр суммы в числе
    while ($numb>0){
        if ($numsOfSum>NumInResultNumber($numsOfSum, (int)($numb%10))){
            $resultNumber += ($numb % 10)*(10**$pow);
            $pow++;
            $numsOfSum=NumInResultNumber($numsOfSum, (int)($numb%10));
        }
        $numb = (int)($numb/10);
    }

    return $resultNumber;
}

$N = 2226;
$K = 10;

$ascNum = ascSortNumber($N);
$searchNumb = searchSum($ascNum,$K);


for ($i = 1; $i<=$N; $i++){
    $ascNum = ascSortNumber($i);
    $searchNumb = searchSum($ascNum,$K);
    if ($searchNumb>0) {
        echo "$i ".buildNumb($i, $searchNumb)."\n";
    }
}
