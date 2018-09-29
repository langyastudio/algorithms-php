<?php
/**
 * 散列表（散列映射、映射、字典、关联数组）- O(1)
 *  用途：用于查找、防止重复、用于缓存等
 *  性能：较好的散列函数均匀的将输入键映射到数组中（将键换算成数字，例如SHA），涉及键散列后的数字冲突的使用链表解决
 */
$book = [];

// an apple costs 67 cents
$book['apple'] = 0.67;
// milk costs $1.49
$book['milk']    = 1.49;
$book['avocado'] = 1.49;

var_dump($book);