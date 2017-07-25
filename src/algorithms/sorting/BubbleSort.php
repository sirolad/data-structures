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

print_r(i3BubbleSort([97, 20, 33, 45, 52, 67, 88, 92, 93, 10]));

function iBubbleSort(array $arr): array {
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
        $swapped = FALSE;
        for ($j = 0; $j < $len - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
                $swapped = TRUE;
            }
        }
        echo $swapped;
        if(! $swapped) break;
    }
    return $arr;
}


function i2BubbleSort(array $arr): array {
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
        $swapped = FALSE;
        for ($j = 0; $j < $len - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
                $swapped = TRUE;
            }
        }
        if(! $swapped) break;
    }
    return $arr;
}

function i3bubbleSort(array $arr): array {
    $len = count($arr);
    $count = 0;
    $bound = $len-1;

    for ($i = 0; $i < $len; $i++) {
	$swapped = FALSE;
	$newBound = 0;
	for ($j = 0; $j < $bound; $j++) {
	    $count++;
	    if ($arr[$j] > $arr[$j + 1]) {
		$tmp = $arr[$j + 1];
		$arr[$j + 1] = $arr[$j];
		$arr[$j] = $tmp;
		$swapped = TRUE;
		$newBound = $j;

	    }
	}
	$bound = $newBound;

	if(! $swapped) break;
    }
    echo $count."\n";
    return $arr;
}
