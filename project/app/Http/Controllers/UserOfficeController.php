<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketRequest;
use App\Http\Requests\DeleteBasketRequest;
use App\Models\Basket;
use App\Models\DroneShop;
use App\Models\Favorites;
use App\Models\Orders;
use App\Models\Users;
use Illuminate\Http\Request;
use Session;

class UserOfficeController extends Controller
{
    public function delete_basket(DeleteBasketRequest $request){
        $baskets = new Basket();
        $products = new DroneShop();
        $users = new Users();
        $arr_info = explode("\n", $request->info);
        echo '<p>'.$request->info.'</p>';
        echo '<p>'.$arr_info[0].'</p>';
        echo '<p>'.Session::get("name_user")[0][0]->login.'</p>';
        $id_prod = $products->where('name_product', $arr_info[0])->get('id_product')[0]->id_product;
        if (gettype(Session::get('name_user')[0]) == 'string'){
            $id_user = $users->where('login', Session::get('name_user')[0])->get('id_user')[0]->id_user;
        } else if (gettype(Session::get('name_user')[0]) == 'object') {
            $id_user = $users->where('login', Session::get('name_user')[0][0]->login)->get('id_user')[0]->id_user;
        }
        $id_bask = $baskets->where('id_user', $id_user)->where('id_product', $id_prod)->delete();


    }

    public function delete_favorite(DeleteBasketRequest $request){
        $favorites = new Favorites();
        $products = new DroneShop();
        $users = new Users();
        $arr_info = explode("\n", $request->info);
        echo '<p>'.$request->info.'</p>';
        echo '<p>'.$arr_info[0].'</p>';
        echo '<p>'.Session::get("name_user")[0][0]->login.'</p>';
        $id_prod = $products->where('name_product', $arr_info[0])->get('id_product')[0]->id_product;
        if (gettype(Session::get('name_user')[0]) == 'string'){
            $id_user = $users->where('login', Session::get('name_user')[0])->get('id_user')[0]->id_user;
        } else if (gettype(Session::get('name_user')[0]) == 'object') {
            $id_user = $users->where('login', Session::get('name_user')[0][0]->login)->get('id_user')[0]->id_user;
        }
        $id_favor = $favorites->where('id_user', $id_user)->where('id_product', $id_prod)->delete();
    }

    public function add_order(DeleteBasketRequest $request){
        $prod = new DroneShop();
        $order = new Orders();
        $basket = new Basket();
        $userData = new Users();
        if (gettype(Session::get('name_user')[0]) == 'string'){
            $id_user = $userData->where('login', Session::get('name_user')[0])->get('id_user')[0]->id_user;
        } else if (gettype(Session::get('name_user')[0]) == 'object') {
            $id_user = $userData->where('login', Session::get('name_user')[0][0]->login)->get('id_user')[0]->id_user;
        }
        $pay = $request->pay;
        $address = $request->address;
        $phone = $request->phone;
        $date = $request->date;
        $sum = $request->sum;

        $order->id_user = $id_user;
        $order->payment = $pay;
        $order->address = $address;
        $order->phone = $phone;
        $order->date_order = $date;
        $order->sum_price = $sum;

        $order->save();

        $id_order = $order->where('id_user', $id_user)->get('id_order')[0]->id_order;

        $basket->where('id_user', $id_user)->where('id_order', 0)->update(['id_order' => $id_order]);

        $basket->where('id_user', $id_user)->where('id_order', $id_order)->where('id_order', '!=', 0)->delete();

    }
}
