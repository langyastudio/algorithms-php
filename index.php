<?php
require_once __DIR__ . '/lib/binary_search.php';
require_once __DIR__ . '/lib/selection_sort.php';
require_once __DIR__ . '/lib/recursion.php';
require_once __DIR__ . '/lib/quicksort.php';

if(!function_exists('logex')){
    function logex($comment, $value)
    {
        echo "$comment" . "<br>" . $value . "<br>";
        echo '----------------------------------' . "<br>" . "<br>";
    }
}

//1.0 binary search
$arr = [1, 3, 5, 7, 9];
logex('binary search: 1, 3, 5, 7, 9 -> 5', binary_search(5, $arr));

//2.0 selection sort
logex('selection sort: 5, 3, 6, 2, 10', '[' . join(', ', selection_sort([5, 3, 6, 2, 10])) . ']');

//3.0 recursion
logex('recursion: 5!', fact(5));

//4.0 quick sort
logex('quick sort: 5, 3, 6, 2, 10', '[' . join(', ', quick_sort([5, 3, 6, 2, 10])) . ']');