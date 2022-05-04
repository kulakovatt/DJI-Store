<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Session;

class RegistController extends Controller
{
    public function submit(UsersRequest $req){

        $user = new Users();
        $user->login = $req->input('login');
        $user->email = $req->input('email');
        $user->code = mt_rand(100000, 900000);
        $user->password = Hash::make($req->input('password'));
        Session::push('code', $user->code);
        Session::push('email', $user->email);
        $user->save();

        //как-то уведомить об регистрации
//        echo '<script type="text/javascript">alert("Регистрация прошла успешно!");</script>';
        return redirect()->route('send');
    }

}
