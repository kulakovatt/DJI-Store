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


        Mail::send(['text'=>'mail'], ['name', 'DJI Shop'], function ($message){

            $message->to(Session::get('email')[0])->subject('Код для подтверждения регистрации');
            $message->from('paperatravel@gmail.com', 'Команда DJI');

        });
        return redirect()->route('verify');
    }
}
