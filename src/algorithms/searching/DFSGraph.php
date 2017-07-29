<?php

function DFS(array &$graph, int $start, array $visited): SplQueue
{
    $stack = new SplStack;
    $path  = new SplQueue;
    $stack->push($start);
    $visited[$start] = 1;
    while (!$stack->isEmpty()) {
        $node = $stack->pop();
        $path->enqueue($node);
        foreach ($graph[$node] as $key => $vertex) {
            if (!$visited[$key] && $vertex == 1) {
                $visited[$key] = 1;
                $stack->push($key);
            }
        }
    }
    return $path;
}
