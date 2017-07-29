<?php

function BFS(array &$graph, int $start, array $visited): SplQueue
{
    $queue = new SplQueue;
    $path  = new SplQueue;
    $queue->enqueue($start);
    $visited[$start] = 1;
    while (!$queue->isEmpty()) {
        $node = $queue->dequeue();
        $path->enqueue($node);
        foreach ($graph[$node] as $key => $vertex) {
            if (!$visited[$key] && $vertex == 1) {
                $visited[$key] = 1;
                $queue->enqueue($key);
            }
        }
    }
    return $path;
}
