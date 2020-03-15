<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;

class SysController extends Controller
{
    //
    public function show()
    {
        return view('sys/login', ['title' => '96OP后台管理', 'title_min' => '96OP后台管理 V1.0']);
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $uu = User::get();
        return $uu;
    }
}

