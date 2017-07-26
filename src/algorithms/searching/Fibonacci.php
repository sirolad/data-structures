<?php

/**
 * A recursive function to get the Nth term of fibonacci Series.
 * @param  int $n
 * @return int
 */
function fibonacci(int $n) :int
{
  if ($n < 0) {
    return -1;
  } else if ($n == 0 || $n == 1) {
    return $n;
  }

  return fibonacci($n - 1) + fibonacci($n - 2);
}

echo fibonacci(9);
