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

        Session::forget('code');
        Session::push('code', $user->code);
//        if(Session::get('name_user') == ""){
//            Session::push('name_user', $user->login);
//        } else {
//            Session::forget('name_user');
//            Session::push('name_user', $user->login);
//        }
        Session::forget('name_user');
        Session::push('name_user', $user->login);
        echo '<p>'.Session::get('name_user')[0].'</p>';
        echo '<p>'.$user->login.'</p>';
        Session::push('email', $user->email);
        $user->save();

        //TODO: как-то уведомить об регистрации (сделать как с личным кабинетом)
//        echo '<script type="text/javascript">alert("Регистрация прошла успешно!");</script>';
        return redirect()->route('send');
    }

}
