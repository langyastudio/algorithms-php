<?php
/**
 * 广度优先搜索 - 找出两样东西之间段数最少的路径
 *  1、使用图建立问题模型
 *  2、使用广度优先搜索解决问题
 *  3、检查过的不用再检查，否则死循环
 */

function enqueues(\SplQueue $queue, array $persons)
{
    foreach ($persons as $person)
    {
        $queue->enqueue($person);
    }
}

//最后一位为 m ，为目标结果
function personIsSeller(string $name): bool
{
    return $name[-1] == 'm';
}

//O(V+E)
function breadth_first_search(string $name, array $graph)
{
    # This array is how you keep track of which people you've searched before.
    $searched = [];

    $searchQuery = new \SplQueue();
    enqueues($searchQuery, $graph[$name]);

    while (!$searchQuery->isEmpty())
    {
        $person = $searchQuery->dequeue();

        # Only search this person if you haven't already searched them.
        if (!isset($searched[$person]))
        {
            if(personIsSeller($person))
            {
                return $person;
            }
            else
            {
                enqueues($searchQuery, $graph[$person]);

                # Marks this person as searched
                $searched[$person] = true;
            }
        }
    }

    return false;
}