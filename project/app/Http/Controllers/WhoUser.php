<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Favorites;
use App\Models\Orders;
use App\Models\Users;
use App\Models\DroneShop;
use Illuminate\Http\Request;
use Session;

class WhoUser extends Controller
{
    public function all_user(){

        $userData = new Users();
        $favorite = new Favorites();
        $order = new Orders();
        $products = DroneShop::all();
        $basket = new Basket();
//            echo '<p>'.Session::get('name_user').'</p>';
            if (Session::get('name_user') == ''){

                return redirect()->route('home')->with('status', 'Необходимо авторизоваться.');;

            } else {
                if (gettype(Session::get('name_user')[0]) == 'string'){
                    $user_role = $userData->where('login', Session::get('name_user')[0])->get('role');
                    $id_user = $userData->where('login', Session::get('name_user')[0])->get('id_user')[0]->id_user;
                } else if (gettype(Session::get('name_user')[0]) == 'object'){
                    $user_role = $userData->where('login', Session::get('name_user')[0][0]->login)->get('role');
                    $id_user = $userData->where('login', Session::get('name_user')[0][0]->login)->get('id_user')[0]->id_user;
                }
                $data = $user_role[0]->role;
                $basket_all = $basket->where('id_user', $id_user)->where('id_order', 0)
                        ->join('products', 'baskets.id_product', '=', 'products.id_product')
                        ->select('baskets.count', 'products.price', 'products.photo', 'products.name_product')
                        ->get();
                $favorite_user = $favorite->where('id_user', $id_user)
                        ->join('products', 'favorites.id_product', '=', 'products.id_product')
                        ->select('products.name_product', 'products.price', 'products.photo')
                        ->get();
                $order_all = $order->where('id_user', $id_user)->get();
                return view('office')->with(compact('data','products', 'basket_all', 'favorite_user', 'order_all'));
            }


    }
}
