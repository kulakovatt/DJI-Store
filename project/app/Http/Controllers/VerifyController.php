<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VerifyRequest;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Session;

class VerifyController extends Controller
{
    public function input_code(VerifyRequest $req){
        $input = $req->input('code');

        echo '<p>'.$input.'</p>';
        echo '<p>'.var_dump(Session::get('code')).'</p>';
        echo '<p>'.Session::get('code')[0].'</p>';
        if($input == Session::get('code')[0]){
            return redirect()->route('home');
        }
//        Session::forget('code');
    }

}
