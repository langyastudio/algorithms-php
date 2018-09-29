<?php
/**
 * other:
 *  1、B Tree (二叉查找树) - 相比于有序数组，插入与删除速度快很多
 *  2、傅里叶变换 - 处理信号
 *  3、并行算法 - 短时间处理海量数据
 *   并行性管理开销、负载均衡
 *   MapReduce - 例如通过Hadoop使用它
 *  4、概率性算法 - 海量数据的散列表等
 *   布隆过滤器 - 用于不要求答案绝对精确的情况
 *   HyperLogLog
 *  5、SHA
 *   比较文件
 *   检查密码
 *  6、局部不敏感的散列算法 - 相似度
 *   SlimHash
 *  7、秘钥交换
 *   Diffie-Hellman
 *  8、线性规划 - 给定约束条件下最大限度地改善指定的指标
 *   Simplex
 */
require_once __DIR__ . '/lib/binary_search.php';
require_once __DIR__ . '/lib/selection_sort.php';
require_once __DIR__ . '/lib/recursion.php';
require_once __DIR__ . '/lib/quicksort.php';
require_once __DIR__ . '/lib/breadth_first_search.php';
require_once __DIR__ . '/lib/greedy.php';

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

//5.0 breadth first search
$graph           = [];
$graph['you']    = ['alice', 'bob', 'claire'];
$graph['bob']    = ['anuj', 'peggy'];
$graph['alice']  = ['peggy'];
$graph['claire'] = ['thom', 'jonny'];
$graph['anuj']   = [];
$graph['peggy']  = [];
$graph['thom']   = [];
$graph['jonny']  = [];

logex('breadth first search: you!', breadth_first_search('you', $graph));

//6.0 greedy
$statesNeeded = ['mt', 'wa', 'or', 'id', 'nv', 'ut', 'ca', 'az'];

$stations['kone']   = ['id', 'nv', 'ut'];
$stations['ktwo']   = ['wa', 'id', 'mt'];
$stations['kthree'] = ['or', 'nv', 'ca'];
$stations['kfour']  = ['nv', 'ut'];
$stations['kfive']  = ['ca', 'az'];

logex('greedy: ', implode('-', greedy($stations, $statesNeeded)));