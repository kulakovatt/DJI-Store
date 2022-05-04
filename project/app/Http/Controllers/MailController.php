<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Models\Users;
use Illuminate\Support\Facades\View;
use Session;
use Mail;


class MailController extends Controller
{
    public function send(){
//        $users = new Users();

//        $usercode = $users->where('login', $login)->get('code');

//        Session::push('code', 123123);
//        $useremail = $users->where('login', $login)->get('email');
//        Session::push('email', $useremail[0]->email);
//        echo '<p>'.Session::get('email').'</p>';
//        echo '<p>'.Session::get('code').'</p>';
    //TODO: отправка работает, нужно лишь добавить вставку полученного кода после отправки в форму, как-то сравнивать эти значения и только потом переводить на главную страницу
    //TODO: и сделать вставку email адреса который был только что введен (возможно записать в сессию), поправить запрос на получение данных с таблицы
        Mail::send(['text'=>'mail'], ['name', 'DJI Shop'], function ($message){

            $message->to(Session::get('email')[0])->subject('Код для подтверждения регистрации');
            $message->from('paperatravel@gmail.com', 'Команда DJI');

        });
        return redirect()->route('verify');
    }
}
