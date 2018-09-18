<?php

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
 * 选择排序 - O（n*n）
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
