<?php
/*
Для  каждого  числа  заданной  последовательности  натуральных   чисел
n0 ,n1,...,nm установить,  можно  ли  вычеркнуть  в  нем  некоторые  цифры,
чтобы сумма оставшихся равнялась заданному числу к.
*/


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
function buildNumb(int $numb, int $numsOfSum) : string
{
    $pow = 0;
    $resultNumber = "";

//поиск цифр суммы в числе
    while ($numb>0){
        if ($numsOfSum>NumInResultNumber($numsOfSum, (int)($numb%10))){
            $resultNumber .= ($numb % 10);
            $resultNumber .= $numsOfSum < 10 ? " = " : " + ";
            $pow++;
            $numsOfSum=NumInResultNumber($numsOfSum, (int)($numb%10));
        }
        $numb = (int)($numb/10);
    }

    return $resultNumber;
}

$N = 2226;
$K = 22;

for ($i = 1; $i<=$N; $i++){
    $searchNumb = searchSum($i,$K);
    if ($searchNumb>0) {
        echo "$i ".buildNumb($i, $searchNumb)."$K\n";
    }
}
