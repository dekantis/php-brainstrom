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

function permutations($pool, $r = null) {
    $n = strlen($pool);

    if ($r == null) {
        $r = $n;
    }

    if ($r > $n) {
        return;
    }

    if ($n <= 0) {
        return;
    }

    $indices = range(0, $n - 1);
    $cycles = range($n, $n - $r + 1, -1); //Массив индексов для циклов

    yield substr($pool, 0, $r);

    while (true) {
        $exit_early = false;
        for ($i = $r;$i--;) {
            $cycles[$i]-= 1;
            if ($cycles[$i] == 0) {
                // добавление элементов конеца строки
                if ($i < count($indices)) {
                    $removed = array_splice($indices, $i, 1);
                    array_push($indices, $removed[0]);
                }
                $cycles[$i] = $n - $i;
            } else {
                $j = $cycles[$i];
                // Меняем местами $i элемент с $j ым
                $i_val = $indices[$i];
                $neg_j_val = $indices[count($indices) - $j];
                $indices[$i] = $neg_j_val;
                $indices[count($indices) - $j] = $i_val;
                $result = "";
                $counter = 0;
                foreach ($indices as $indx) {
                    $result .= $pool[$indx];
                    $counter++;
                    if ($counter == $r) break;
                }
                yield $result;
                $exit_early = true;
                break;
            }
        }
        if (!$exit_early) {
            break; // Выход во внешний цикл
        }
    }
}

$result = iterator_to_array(permutations("abcde", 2));
$count = 0;
foreach ($result as $row) {
    echo "$row \n";
    $count++;
}
echo $count;
// abc abd acb acd adb adc
// bac bad bca bcd bad bda
// // ca cb cd
// da db dc
