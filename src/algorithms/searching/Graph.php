<?php

//Creating a Graph using Adjacency Matrix
$graph = [];
$visited = [];
$vertexCount = 6;
for($i = 1;$i<=$vertexCount;$i++) {
  $graph[$i] = array_fill(1, $vertexCount, 0);
  $visited[$i] = 0;
}
print_r($graph);
