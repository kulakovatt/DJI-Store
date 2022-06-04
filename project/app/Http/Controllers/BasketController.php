<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\DroneShop;
use App\Models\Favorites;
use App\Models\Orders;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Requests\BasketRequest;
use Session;

class BasketController extends Controller
{
    public function add_basket(BasketRequest $request) {
        $prod = new DroneShop();
        $userData = new Users();
        $arr_info = explode("\n", $request->info);
        $id_prod = $prod->where('name_product', $arr_info[0])->get('id_product');
        if (gettype(Session::get('name_user')[0]) == 'string'){
            $id_user = $userData->where('login', Session::get('name_user')[0])->get('id_user');
        } else if (gettype(Session::get('name_user')[0]) == 'object') {
            $id_user = $userData->where('login', Session::get('name_user')[0][0]->login)->get('id_user');
        }
        $prodB = new Basket();

//          echo '<p>'.$request->info.'</p>';
//          echo '<p>'.$arr_info[0].'</p>';
//          echo '<p>'.$id_user[0]->id_user.'</p>';
//          echo '<p>'.$id_prod[0]->id_product.'</p>';

        //если в basket еще нет
        if(Basket::where('id_product', '=', $id_prod[0]->id_product)->count() == 0){
            $prodB->count = 1;
            $prodB->id_user = $id_user[0]->id_user;
            $prodB->id_product = $id_prod[0]->id_product;
        } else if (Basket::where('id_product', '=', $id_prod[0]->id_product)->count() > 0) { //если есть, то получить количество товара уже в basket и к нему добавлять 1, пока не дойдет до доступного кол-ва
            $count = $prodB->where('id_product', '=', $id_prod[0]->id_product)->get('count');
            $curr_count = $count[0]->count;
            if ($curr_count < $prod->where('id_product', '=', $id_prod[0]->id_product)->get('count')[0]->count){
                $prodB->count = $curr_count + 1;
                $prodB->where('id_product', '=', $id_prod[0]->id_product)->update(['count' => $curr_count + 1]);
            } else {
//                echo '<script>alert("Данный товар закончился на складе.")</script>';
            }

        }


        $prodB->save();

    }

    public function add_favorite(BasketRequest $request){
        $favorites = new Favorites();
        $prod = new DroneShop();
        $userData = new Users();
        $arr_info = explode("\n", $request->info);
        $id_prod = $prod->where('name_product', $arr_info[0])->get('id_product')[0]->id_product;
        if (gettype(Session::get('name_user')[0]) == 'string'){
            $id_user = $userData->where('login', Session::get('name_user')[0])->get('id_user')[0]->id_user;
        } else if (gettype(Session::get('name_user')[0]) == 'object') {
            $id_user = $userData->where('login', Session::get('name_user')[0][0]->login)->get('id_user')[0]->id_user;
        }
        $curr_fav = $favorites->where('id_user', $id_user)->where('id_product', $id_prod)->get();

        if ($curr_fav->count() == 0){

            $favorites->id_user = $id_user;
            $favorites->id_product = $id_prod;

            $favorites->save();
        }

    }

}
