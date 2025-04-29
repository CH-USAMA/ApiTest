<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\PriceHelper;

class TestController extends Controller
{
    // In PHP, the __invoke method is a magic method.
    // It allows an object to be called like a function.
    // This is useful for creating single-action controllers.
    // The __invoke method is automatically called when the object is called as a function.
    public function __invoke(Request $request)
    {
        return response()->json([
            'message' => 'This is a test controller using the __invoke method.',
            'data' => $request->all(),
        ]);
    }


    public function test()
    {
        echo PriceHelper::format(1500);
        echo format_price(1500); // Outputs: 1,500.00 PKR


        return response()->json([
            'message' => 'This is a test method.',
        ]);
    }

}
