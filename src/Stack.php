<?php
namespace Sirolad;

/**
 * Stack Interface
 */
interface Stack
{
    public function push(string $item);

    public function pop();

    public function top();

    public function isEmpty();
}
