<?php

// Dynamic programming solution
// Very efficient in terms of time complexity
function DPFibonacci(int $n)
{
  // array to store the value of each term of series till n.
   // Dynamic programming is all about storing the computed values
   // so that we need not compute it again during further processing
  $fib = [];
  $fib[0] = 0; $fib[1] = 1;

  for ($i = 2; $i <= $n; $i++) {
    $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
  }

  return $fib[$n];
}

print_r(DPFibonacci(2));
