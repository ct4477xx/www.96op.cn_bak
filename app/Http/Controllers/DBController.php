<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class DBController extends Controller
{

    public function model(){
        $user = new User;
        $user -> name ='110';
        $user -> password ='1234566';
        $user -> email ='1423@123.ccc';
        $user->save();

    }
    //
    public function select(){

        //$rs = DB::select('select * from users');
        //dd($rs);

    }
}
