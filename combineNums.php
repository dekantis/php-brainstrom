<?php

/*
Надо создать класс, который
будет выводить все возможные комбинации без повторений из строки символов, установленной длинны.
Так же кол-во комбинаций.
Например, вводим строку "123", и длинну строки 2, получаем
12 13 23 21 32 31
Если строка будет "111", то по логике размещений всё равно должно получиться
11 11 11 11 11
+ нужен метод который считает размещения, в обход основного алгоритма.
Это не сложная формула из комбинаторики  - размещения без повторений.
n!/(n - m)!     n - размер множества      m - размер искомого подмножества
По ней мы будем сверять результат работы.

Должна быть обработка ошибок.
метод записи ошибки
метод получения ошибок
метод отображения ошибки

Класс должен работать со своим экземпляром ($this), это озночает, что не
не должно быть статических методов.
*/


class CombineNums
{
    private $arr = [];
    private $errors = [];

    private function setErrors ($str, $len)
    {
        if (empty($str) || empty($len)) {
            $this->errors[] = "Не введена строка \$str или длинна \$len подстроки";
        }
        if (gettype($str) != "string" || strlen($str) < 1) {
            $this->errors[] = "Неверно введенная строка \$str";
        }
        if (gettype($len) != "integer" || $len < 1) {
            $this->errors[] = "Неверно задана длинна подстрок \$len";
        }
        if (strlen($str) < $len) {
            $this->errors[] = "Количство символов в строке \$str не должно быть меньше длинны \$len подстроки";
        }
    }

    public function showErrors()
    {
        foreach ($this->errors as $error) {
            echo "$error \n";
        }
    }

    public function getErrors($str, $len) {
        $this->setErrors($str, $len);
        if ($this->errors) {
            return true;
        }
        return false;
    }

    public function combine(string $str, int $len, $resultStr = "")
    {
        for ($i = 0; $i < strlen($str); $i++) {
            $resultStr .= $str[$i];
            if (strlen($resultStr) == $len) {
                $this->arr[] = $resultStr;
                $resultStr = str_replace($str[$i], "", $resultStr);
            } else {
                $this->combine(str_replace($str[$i], "", $str), $len, $resultStr);
            }
            $resultStr = str_replace($str[$i], "", $resultStr);
        }
    }

    private function factorial (int $number) : int
    {
        return $number > 1 ? $number * $this->factorial($number-1) : 1;
    }

    public function getCalculateCombinations(string $str, int $len) : int
    {
        return $this->factorial(strlen($str)) / ($this->factorial(strlen($str)-$len));
    }

    public function getArray()
    {
        return $this->arr;
    }
}
//Входные параметры (строка и длинна подстрок вхождений)
$str = "asdfgh";
$len = 5;

$combineNums = new CombineNums();
//проверка на ошибки входных параметров
if ($combineNums->getErrors($str, $len)) {
    $combineNums->showErrors();
    die();
}
//Заполнение массива комбинаций подстроками
$combineNums->combine($str, $len);
var_dump($combineNums->getArray());
//сверка с формулой
echo "Количество размещений без повторений по формуле N!/(N-M)! = " .$combineNums->getCalculateCombinations($str, $len);
