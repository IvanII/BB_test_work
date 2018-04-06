<?php

namespace App\Http\Controllers\Chat;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class ChatController extends Controller
{

    public function index()
    {
        return view('chat.index');
    }
}