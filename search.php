<?php

//======================================================== 二分法查找 ===================================================//
/**
 * 二分法查找
 *
 * 有序数组，从中间开始查找，每次排除一半（ O（log2(n)） -- 大O表示法指出了最糟糕情况下的运行操作数的增速）
 * 对数运算是幂运算的逆运算。log2（8）= 3  <=> 2(3)=8
 *
 * @param $needle
 * @param $array
 *
 * @return float|int|null
 */
function binary_search($needle, $array)
{
    $low  = 0;
    $high = count($array) - 1;

    while ($low <= $high)
    {
        $middle = floor($low + $high) / 2;

        if ($array[$middle] == $needle)
            return $middle;

        if ($array[$middle] > $needle)
            $high = $middle - 1;
        else
            $low = $middle + 1;
    }

    return null;
}

//======================================================== 选择排序 ====================================================//
function findsmall(array $arr)
{
    $smallest      = $arr[0];
    $smallestIndex = 0;

    for ($i = 0, $len = count($arr); $i < $len; $i++)
    {
        if ($arr[$i] < $smallest)
        {
            $smallest      = $arr[$i];
            $smallestIndex = $i;
        }
    }

    return $smallestIndex;
}

/**
 * 选择排序
 *
 * 数组适合随机查找；链表适合插入|删除
 *
 * @param array $arr
 *
 * @return array
 */
function selection_sort(array $arr)
{
    $newArr = [];
    for($i=0, $len=count($arr); $i<$len; $i++)
    {
        $smallestIndex = findsmall($arr);
        $newArr[] = array_splice($arr, $smallestIndex, 1)[0];
    }

    return $newArr;
}
