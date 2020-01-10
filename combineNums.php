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
    private $resultStr = "";
    public $str;
    private $len;

    public function __construct($str, $len)
    {
        $this->str = $str;
        $this->len = $len;
    }

    private function setErrors ()
    {
        if (empty($this->str) || empty($this->len)) {
            $this->errors[] = "Не введена строка \$str или длинна \$len подстроки";
        }
        if (gettype($this->str) != "string" || strlen($this->str) < 1) {
            $this->errors[] = "Неверно введенная строка \$str";
        }
        if (gettype($this->len) != "integer" || $this->len < 1) {
            $this->errors[] = "Неверно задана длинна подстрок \$len";
        }
        if (strlen($this->str) < $this->len) {
            $this->errors[] = "Количство символов в строке \$str не должно быть меньше длинны \$len подстроки";
        }
    }

    public function showErrors()
    {
        foreach ($this->errors as $error) {
            echo "$error \n";
        }
    }

    public function getErrors() {
        $this->setErrors();
        if ($this->errors) {
            return true;
        }
        return false;
    }

    public function combine($str)
    {
        for ($i = 0; $i < strlen($str); $i++) {
            $mbSymbol = mb_substr($str, $i,1);
            $this->resultStr .= $mbSymbol;
            if (strlen($this->resultStr) == $this->len) {
                $this->arr[] = $this->resultStr;
            } else {
                $this->combine(mb_ereg_replace($mbSymbol, "", $str));
            }
            $this->resultStr = mb_ereg_replace($mbSymbol, "", $this->resultStr);
        }
    }

    private function factorial (int $number) : int
    {
        return $number > 1 ? $number * $this->factorial($number - 1) : 1;
    }

    public function getCalculateCombinations() : int
    {
        return $this->factorial(strlen($this->str)) / ($this->factorial(strlen($this->str)-$this->len));
    }

    public function getArray()
    {
        return $this->arr;
    }

}
//Входные параметры (строка и длинна подстрок вхождений)
$str = "abcde";
$len = 1;

$combineNums = new CombineNums($str, $len);
//проверка на ошибки входных параметров
if ($combineNums->getErrors()) {
    $combineNums->showErrors();
    die();
}
//Заполнение массива комбинаций подстроками
$combineNums->combine($combineNums->str);
var_dump($combineNums->getArray());
//сверка с формулой
echo "Количество размещений без повторений по формуле N!/(N-M)! = " . $combineNums->getCalculateCombinations();

