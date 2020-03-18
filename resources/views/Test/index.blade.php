<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{!! $title !!}</title>
</head>
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('layui/layui.all.js')}}"></script>


<body>
<table>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>password</td>
        <td>操作</td>
    </tr>
    @foreach($data as $v)
        <tr>
            <td>{{$v['id']}}</td>
            <td>{{$v['name']}}</td>
            <td>{{$v['password']}}</td>
            <td>
                <a href="{{url('test/'.$v['id'].'/edit')}}">修改</a> |
                <a href="javascript:;" onclick="del_ete(this,{!! $v['id'] !!})">删除</a> |
                <a href="{{url('test/'.$v['id'])}}">查看</a>
            </td>
        </tr>
    @endforeach
    <td colspan="4"><a href="{{url('test/create')}}">install</a></td>
</table>
<script>
    function del_ete(obj, id) {
        layer.confirm('确认要删除吗?', function (index) {
            $.post('test/' + id, {'_method': 'delete', '_token': '{{csrf_token()}}'},
                function (data) {
                    if (data.success == 0) {
                        $(obj).parents('tr').remove();
                        layer.msg(data.msg, {icon: 6, time: 1000});
                    } else {
                        layer.msg(data.msg, {icon: 5, time: 1000});
                    }
                })
        })
    }
</script>

</body>
</html>
