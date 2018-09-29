<?php
/**
 * 贪婪算法 - 处理不可能完成的任务：没有快速算法的问题（NP完全问题）
 *  1、每步都选择局部最优解 -> 全局最优解
 *  2、有时候，你只需要找出一个能大致解决问题的算法 - 近似算法
 *  3、易于实现，运行速度快
 */

//集合覆盖问题
function greedy(array $stations, array $statesNeeded)
{
    $final_stations = [];

    while (count($statesNeeded) > 0)
    {
        $best_station   = null;
        $states_covered = [];

        foreach ($stations as $station => $states)
        {
            $covered = array_intersect($statesNeeded, $states);
            if (count($covered) > count($states_covered))
            {
                $best_station   = $station;
                $states_covered = $covered;
            }
        }

        unset($stations[$best_station]);
        $statesNeeded = array_diff($statesNeeded, $states_covered);

        $final_stations[] = $best_station;
    }

    return $final_stations;
}