<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Helper\TestHelper;

class TestController extends Controller
{
    public function fill(){
        $test = new TestHelper(20, 1);
        return true;
    }

    public function index()
    {
        $test = new TestHelper();
        return view('test', ['tests' => $test->get()]);
    }
}
