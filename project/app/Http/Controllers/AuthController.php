<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class AuthController extends Controller
{
    public function all_data(AuthRequest $req){

        $userData = new Users();
        $userPassw = $userData->where('login', $req->input('login'))->get('password');
        $userEmail = $userData->where('login', $req->input('login'))->get('email');
        $curr = $req->input('password');

        if (Hash::check($curr, $userPassw[0]->password)) {
            if ($userEmail[0]->email == $req->input('email')){
                return redirect()->route('home');
            }else{return redirect()->route('auth');}
        }else{return redirect()->route('auth');}

    }
}
