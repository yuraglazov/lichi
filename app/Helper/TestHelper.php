<?php

namespace App\Helper;

use App\Models\Test;

class TestHelper
{
    public function __construct($count = 10, $create = 0)
    {
        if ($create == 1) {
            $this->fill($count);
        }
    }

    private function fill($count)
    {
        Test::factory($count)->create();
    }

    public function get()
    {
        $tests = Test::all();
        return $tests->intersect(Test::whereIn('result', ['success', 'normal'])->get());
    }

}
