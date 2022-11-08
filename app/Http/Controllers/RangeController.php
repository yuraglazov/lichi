<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Range;

class RangeController extends Controller
{
    public function index()
    {
        $range = new Range();
        return view('range', ['sum' => $range->getSum()]);
    }
}
