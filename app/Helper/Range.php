<?php

namespace App\Helper;

class Range
{
    public function getSum()
    {
        $sum = 0;
        for ($i = 0; $i < 10000; $i++) {
            if ($i < 10) {
                $sum+= $i;
                continue;
            }

            if (!$this->checkNumber($i)) {
                $sum += $i;
            }
        }
        return $sum;
    }

    public function checkNumber($i)
    {
        $int = intval($i / 10);
        $div = $i % 10;

        while ($int > 9) {
            if ($div-1 != $int % 10){
                return false;
            }
            $div = $int % 10;
            $int = intval($int / 10);
        }

        if ($div != $int+1){
            return false;
        }

        return true;
    }
}
