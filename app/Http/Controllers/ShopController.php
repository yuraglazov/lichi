<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $parentID = 0;

        if (!empty($request->group)) {
            $parentID = $request->group;
        }

        return view('shop', [
            'groups' => Shop::getGroups($parentID),
            'products' => Shop::getProducts($parentID)
        ]);
    }
}
