<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketRequest;
use Illuminate\Http\Request;
use App\Models\DroneShop;
use Session;

class ProductsController extends Controller
{
    public function all(){
        return view('catalog', ['data'=>DroneShop::all()]);
    }

    public function search(BasketRequest $request){
        $prod = new DroneShop();
        $arr_info = $request->info;

        return view('catalog', ['data'=>$prod->where('name_product', 'like', '%'.$arr_info.'%')->get()]);

    }

    public function sort(BasketRequest $request){
        $prod = new DroneShop();
        $arr_info = $request->info;

        return view('catalog', ['data'=>$prod->orderBy('price', $arr_info)->get()]);
    }

    public function filter(BasketRequest $request){
        $prod = new DroneShop();
        $arr_info = $request->info;

        return view('catalog', ['data'=>$prod->where('name_product', 'like', '%'.$arr_info.'%')->get()]);
    }
}
