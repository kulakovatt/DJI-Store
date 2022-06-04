<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminThreeRequest;
use App\Http\Requests\AdminTwoRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\DroneShop;
use App\Models\Users;
use Session;

class AdminProductController extends Controller
{
    public function add_prod(AdminRequest $req)
    {
        $prod = new DroneShop();

        $prod->name_product = $req->input('name_product');
        $prod->price = $req->input('price');
        $prod->description = $req->input('description');
        $prod->photo = 'images/'.$req->input('photo');
        $prod->count = $req->input('count');

        $prod->save();

        return redirect()->route('office_view');
    }
//
    public function edit_prod(AdminTwoRequest $req1)
    {
        $prod1 = new DroneShop();

        $prod1->where('id_product', $req1->input('members'))->update(['price' => $req1->input('price1'), 'description' => $req1->input('description1'), 'photo' => 'images/'.$req1->input('photo1'), 'count' => $req1->input('count1')]);

        return redirect()->route('office_view');
    }

    public function delete_prod(AdminThreeRequest $req){

        $prod2 = new DroneShop();
        $prod2->where('id_product', $req->input('member_delete'))->delete();
        return redirect()->route('office_view');

    }

}
