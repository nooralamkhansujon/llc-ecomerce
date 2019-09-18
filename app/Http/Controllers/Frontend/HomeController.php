<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
class HomeController extends Controller
{
    
    public function showHomePage(){

        $products = Product::select('id','title','slug','price','sale_price')
        ->where('active',1)
        ->paginate(9);

        return view('frontend.home',compact('products'));
    }
}
