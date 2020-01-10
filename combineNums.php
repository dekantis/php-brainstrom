<?php


class CombineNums
{
    private $arr = [];
    private $countCombinations;
    public function __construct(string $str, int $len)
    {
        $this->combine($str, $len);
        $this->countCombinations = $this->calculateCombinations($str, $len);
    }


    private function combine(string $str, int $len, $resultStr = "")
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

    private function calculateCombinations(string $str, int $len) : int
    {
        return $this->factorial(strlen($str)) / ($this->factorial(strlen($str)-$len));
    }

    public function getArray()
    {
        return $this->arr;
    }

    public function getCountCombinations () : int
    {
        return $this->countCombinations;
    }
}

try {
    $str = "str";
    $len = 2;
    if (empty($str) || gettype($str) != "string") {
        throw new Exception("пустая или неверно введенная строка \$str");
    }
    if (empty($len) || gettype($len) != "integer") {
        throw new Exception("пустая или неверно введенная переменная \$len");
    }
}
catch (exception $e) {
    echo "Произошла ошибка - ",
    $e->getMessage(),
    die();
}


$combineNums = new CombineNums($str, $len);
var_dump($combineNums->getArray());
echo $combineNums->getCountCombinations();