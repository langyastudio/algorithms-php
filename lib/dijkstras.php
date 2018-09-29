<?php
/**
 * 狄克斯特拉算法 - 找出有向无环加权图中前往X的最短路径（最快的路径）
 *  1、找出图中最便宜的节点，并确保没有到该节点的更便宜的路径
 *  2、不能用于负权边（只能使用贝尔曼-福德算法）
 */

$graph               = [];
$graph['start']      = [];
$graph['start']['a'] = 6;
$graph['start']['b'] = 2;
$graph['a']          = [];
$graph['a']['fin']   = 1;
$graph['b']          = [];
$graph['b']['a']     = 3;
$graph['b']['fin']   = 5;
$graph['fin']        = [];

# the costs table
$costs        = [];
$costs['a']   = 6;
$costs['b']   = 2;
$costs['fin'] = PHP_INT_MAX;

# the parents table
$parents        = [];
$parents['a']   = 'start';
$parents['b']   = 'start';
$parents['fin'] = null;

$processed = [];

function findLowestCostNode(array $costs)
{
    global $processed;

    $lowestCost     = PHP_INT_MAX;
    $lowestCostNode = null;

    # Go through each node.
    foreach ($costs as $node => $cost)
    {
        # If it's the lowest cost so far and hasn't been processed yet...
        if ($cost < $lowestCost && !array_key_exists($node, $processed))
        {
            # ... set it as the new lowest-cost node.
            $lowestCost     = $cost;
            $lowestCostNode = $node;
        }
    }

    return $lowestCostNode;
}

# Find the lowest-cost node that you haven't processed yet.
$node = findLowestCostNode($costs);

# If you've processed all the nodes, this while loop is done.
while ($node)
{
    $cost = $costs[$node];

    # Go through all the neighbors of this node.
    $neighbors = $graph[$node];

    foreach (array_keys($neighbors) as $n)
    {
        $newCost = $cost + $neighbors[$n];

        # If it's cheaper to get to this neighbor by going through this node...
        if ($costs[$n] > $newCost)
        {
            # ... update the cost for this node.
            $costs[$n] = $newCost;

            # This node becomes the new parent for this neighbor.
            $parents[$n] = $node;
        }
    }

    # Mark the node as processed.
    $processed[$node] = true;

    # Find the next node to process, and loop.
    $node = findLowestCostNode($costs);
}

print('Cost from the start to each node:');
var_dump($costs);