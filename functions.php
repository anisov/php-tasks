<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 02.03.2018
 * Time: 21:36
 */
//Задание #1
//1. Функция должна принимать массив строк и выводить каждую строку в
//отдельном параграфе (тег <p>)
//2. Если в функцию передан второй параметр true, то возвращать (через return)
//результат в виде одной объединенной строки.
function task1($mas, $true = null)
{
    if ($true) {
        $newMas = [];
        foreach ($mas as $i) {
            array_push($newMas, "<p>$i</p>");
        }
        return implode('', $newMas);
    }
    foreach ($mas as $i) {
        echo '<p>' . $i . '</p>';
    }
}

//Задание #2
//1. Функция должна принимать 2 параметра:
//a. массив чисел;
//b. строку, обозначающую арифметическое действие, которое нужно
//выполнить со всеми элементами массива.
//2. Функция должна вывести результат на экран.
//3. Функция должна обрабатывать любой ввод, в том числе некорректный и
//выдавать сообщения об этом

function task2($masInt, $mathString)
{
    $int = null;
    foreach ($masInt as $i) {
        if (is_numeric($i)) {
            if ($int) {
                if ($mathString == '+') {
                    $int = $i + $int;
                } elseif ($mathString == '*') {
                    $int = $i * $int;
                } elseif ($mathString == '/') {
                    $int = $i / $int;
                } elseif ($mathString == '-') {
                    $int = $i - $int;
                } elseif ($mathString == '%') {
                    $int = $i % $int;
                } elseif ($mathString == '**') {
                    $int = $i ** $int;
                } else {
                    return 'Некорректный ввод арифметического оператора.';
                }

            } else {
                $int = $i;
            }
        } else {
            return 'Некорректный массив, в нём содержаться не только числа.';
        }
    }
    return $int;
}

//Задание #3
//1. Функция должна принимать переменное число аргументов.
//2. Первым аргументом обязательно должна быть строка, обозначающая
//арифметическое действие, которое необходимо выполнить со всеми
//передаваемыми аргументами.
//3. Остальные аргументы это целые и/или вещественные числа.
//Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
//Результат: 1 + 2 + 3 + 5.2 = 11.2
function task3()
{
    if (func_get_arg(0) == '-' or '+' or '*' or '/') {
        $int = null;
        for ($i = 1; $i < func_num_args(); $i++) {
            if (is_numeric(func_get_arg($i))) {
                if ($int) {
                    if (func_get_arg(0) == '+') {
                        $int = func_get_arg($i) + $int;
                    } elseif (func_get_arg(0) == '*') {
                        $int = func_get_arg($i) * $int;
                    } elseif (func_get_arg(0) == '/') {
                        $int = func_get_arg($i) / $int;
                    } elseif (func_get_arg(0) == '-') {
                        $int = func_get_arg($i) - $int;
                    } elseif (func_get_arg(0) == '%') {
                        $int = func_get_arg($i) % $int;
                    } elseif (func_get_arg(0) == '**') {
                        $int = func_get_arg($i) ** $int;
                    } else {
                        return 'Некорректный ввод арифметического оператора.';
                    }
                } else {
                    $int = func_get_arg($i);
                }
            } else {
                return 'Некорректный массив, в нём содержаться не только числа.';
            }
        }
    } else {
        return 'Некорректный ввод арифметического оператора.';
    }
    return $int;
}

//Задание #4
//1. Функция должна принимать два параметра – целые числа.
//2. Если в функцию передали 2 целых числа, то функция должна отобразить
//таблицу умножения размером со значения параметров, переданных в функцию.
//(Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна
//быть выполнена с использованием тега <table>
//3. В остальных случаях выдавать корректную ошибку.

function task4($rowTable, $columnTable)
{
    echo '<table border="1" width="100%" cellpadding="5">'.PHP_EOL;
    if (is_int($rowTable) and is_int($columnTable)) {
        for ($i = 0; $i < $rowTable; $i++) {
            echo '<tr>';
            for ($x = 0; $x < $columnTable; $x++) {
                echo '<td>', ($x + 1) * ($i + 1);
            }
            echo '</tr>'.PHP_EOL;
        }
    } else {
        echo 'Некорректный ввод, введите, пожалуйста, целые числа.';
    }

    echo '</table>'.'<br/>'.PHP_EOL;
}

//Задание #5
//1. Написать две функции.
//2. Функция №1 принимает 1 строковый параметр и возвращает true​, если строка
//является палиндромом*, false​в противном случае. Пробелы и регистр не
//должны учитываться.
//3. Функция №2 выводит сообщение в котором на русском языке оговаривается
//результат из функции №1
//* Палиндром – строка, одинаково читающаяся в обоих направлениях.

function task5($palString)
{
    $palString = str_replace(' ', '', $palString);
    $palString = mb_strtolower($palString);
    $revString = iconv('utf-8', 'utf-16le', $palString);
    $revString = strrev($revString);
    $revString = iconv('utf-16be', 'utf-8', $revString);
    if ($palString == $revString) {
        return true;
    } else {
        return false;
    }
}

function validator($func)
{
    if ($func) {
        echo 'Строка палиндром';
    } else {
        echo 'Строка не палиндром';
    }
}

//Задание #6 (выполняется после вебинара “​ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
//1. Выведите информацию о текущей дате в формате 31.12.2016 23:59
//2. Выведите unixtime время соответствующее 24.02.2016 00:00:00.