<?php
require_once __DIR__ . '/binary_search.php';
require_once __DIR__ . '/selection_sort.php';
require_once __DIR__ . '/recursion.php';

//1.0 binary search
$arr = [1, 3, 5, 7, 9];
$index = binary_search(5, $arr);
echo $arr[$index] . "<br>";

//2.0 selection sort
echo '[' . join(', ', selection_sort([5, 3, 6, 2, 10])) . ']' .  "<br>";

//3.0 recursion
echo fact(5) .  "<br>";;



