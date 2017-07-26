<?php

function DPFibonacci(int $n)
{
  $fib = [];
  $fib[0] = 0; $fib[1] = 1;

  for ($i = 2; $i < $n; $i++) {
    $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
  }

  return $fib[$n - 1];
}

print_r(DPFibonacci(10));
