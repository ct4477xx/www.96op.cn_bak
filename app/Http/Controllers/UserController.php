<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function add(){
        return view('add');
    }


    public function insert(){
        echo 'insert';
    }


    public function show($id){
        echo $id;
    }

    public function index(){
        return '用户列表';

    }




}
