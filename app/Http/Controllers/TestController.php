<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $test = Test::get();
        $data['title'] = 'index ' . now();
        $data['data'] = $test;
        return view('Test.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = '添加页面';
        $data['now'] = now();
        return view('Test.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取表单数据
        $input = $request->all();
        //查看数据是否存在
        $is_name = Test::where('name', $input['username'])->first();
        if(!$is_name) {
            $user = new Test;
            $user['name'] = $input['username'];
            $user['password'] = Hash::make($input['password'] ?: 123456);
            $user->save();
            if (!$user) {
                return ['success' => 200, 'msg' => '新增失败'];
            } else {
                return redirect('test');
            }
        }else{
            return ['success'=>200,'msg'=>'用户名已存在'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $inx = Test::find($id);
        $data=[];
        $data['title']='查看用户数据';
        $data['now']=now();
        return view('test.show',['inx'=>$inx,'data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Test::find($id);
        $d = [];
//        $data['id']=$id;
//        $data['username']=$user['name'];
//        $data['password']=$user['password'];
        $d['title'] = '用户: ' . $user['name'] . ' 的修改';
        $d['now'] = $data['now'] = now();
        return view('test.edit', ['data' => $user, 'd' => $d]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        //查看数据是否存在
        $is_name = Test::where('name', $input['username'])->first();
        if(!$is_name) {
            $user = Test::find($id);
            $user['name'] = $input['username'];
            $user['password'] = Hash::make($input['password'] ?: 123456);
            $res = $user->save();
            if (!$res) {
                return back();
            } else {
                return redirect('/test');
            }
        }else{
            return ['success'=>200,'msg'=>'用户名已存在'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = Test::find($id);
        $res = $user->delete();
        if(!$res){
            $data=[
                'success'=>200,
                'msg'=>'删除失败'
            ];
        }else{
            $data=[
                'success'=>0,
                'msg'=>'删除成功'
            ];
        }
        return $data;
    }
}
