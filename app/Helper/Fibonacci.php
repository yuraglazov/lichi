<?php

namespace App\Helper;

class Fibonacci
{
    private $fibonacciArray = [1,1];

    public function getFibonacciSum($fib)
    {
        $sum = 0;
        foreach ($fib as $fibonacci) {
            foreach ($fibonacci as $num) {
                if ($this->isFibonacci($num)) {
                    $sum += $num;
                }
            }
        }

        return $sum;
    }

    public function isFibonacci($x){
        if ($x < $this->fibonacciArray[count($this->fibonacciArray)-1]){
            if (array_search($x, $this->fibonacciArray)){
                return true;
            }
            return false;
        }

        while ($x > $this->fibonacciArray[count($this->fibonacciArray)-1]) {
            $this->fibonacciArray[] = $this->fibonacciArray[count($this->fibonacciArray)-1] + $this->fibonacciArray[count($this->fibonacciArray)-2];
        }

        if ($x == $this->fibonacciArray[count($this->fibonacciArray)-1]) {
            return true;
        }

        return false;
    }
}
