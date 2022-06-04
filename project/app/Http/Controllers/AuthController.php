<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;
use Symfony\Component\HttpKernel\HttpCache\Ssi;

class AuthController extends Controller
{
    public function all_data(AuthRequest $req){

        $userData = new Users();
        $userName = $userData->where('login', $req->input('login'))->get('login');
        $userPassw = $userData->where('login', $req->input('login'))->get('password');
        $userEmail = $userData->where('login', $req->input('login'))->get('email');
        $curr = $req->input('password');
        Session::forget('name_user');

        if (count($userName) == 0){
            return redirect()->route('auth');
        } else {
            if (Hash::check($curr, $userPassw[0]->password)) {
                if ($userEmail[0]->email == $req->input('email')){

                    Session::push('name_user', $userName);
                    return redirect()->route('home');
                }else{return redirect()->route('auth');}
            } else{return redirect()->route('auth');}
        }
    }
}
