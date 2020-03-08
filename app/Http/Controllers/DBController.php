<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DBController extends Controller
{
    //
    public function select(){

        $rs = DB::select('select * from users');
        dd($rs);

    }
}
