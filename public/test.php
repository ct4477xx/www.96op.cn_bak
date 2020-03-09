<?php


use http\Env\Request;
use Illuminate\Support\Facades\DB;

function test($id)
{
    echo $id;
}

$rs = DB::select('select * from user');
return $rs;


test(''234);