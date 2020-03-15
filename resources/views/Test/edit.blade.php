<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{!! $d['title'] !!} {!! $d['now'] !!}</title>
</head>
<body>
<form action="{{url('test/'.$data['id'])}}" method="post">
<table>
    <tr>
        <td>用户名</td>
        <td><input type="text" name="username" value="{!! $data['name'] !!}"></td>
    </tr>
    <tr>
        <td>重置密码</td>
        <td><input type="text" name="password" value=""></td>
    </tr>
    <tr>
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{!! $data['id'] !!}">
        <td colspan="2"><input type="submit" value="修改"></td>
    </tr>
</table>
</form>
</body>
</html>
