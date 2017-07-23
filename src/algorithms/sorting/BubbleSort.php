<?php

function BubbleSort(array $list): array
{
  $len = count($list);
  for ($i = 0; $i < $len; $i++) {
    for ($j = 0; $j < $len - 1; $j++) {
      if ($list[$j] > $list[$j + 1]) {
        $tmp = $list[$j + 1];
        $list[$j + 1] = $list[$j];
        $list[$j] = $tmp;
      }
    }
  }
  return $list;
}

print_r(BubbleSort([10, 45, 93, 67, 97, 52, 88, 33, 92, 20]));
