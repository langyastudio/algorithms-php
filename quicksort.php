<?php
/**
 * 【分而治之】：
 *  找出简单的基线条件 - 处理列表时，基线条件很可能是空数组或包含一个元素的数组
 *  确定如何缩小问题的规模，使其符合基线条件
 */

/**
 *  - O（n*log2(n)）
 */
function quick_sort(array $arr)
{
    // base case, array with 0 or 1 element are already "sorted"
    if(count($arr) < 2)
        return $arr;

    $pivot  = array_shift($arr); //基准值
    $splice = $arr;

    //less than the pivot
    $arrLess = array_filter($splice, function ($el) use ($pivot){
        return $el <= $pivot;
    });

    //greater than the pivot
    $arrGreater = array_filter($splice, function ($el) use ($pivot){
        return $el > $pivot;
    });

    return array_merge(quick_sort($arrLess), [$pivot], quick_sort($arrGreater));
}