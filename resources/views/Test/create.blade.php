<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{!! $title !!} {!! $now !!}</title>
</head>
<body>
<form action="{{url('test')}}" method="post">
<table>
    <tr>
        <td>用户名</td>
        <td><input type="text" name="username" value=""></td>
    </tr>
    <tr>
        <td>密码</td>
        <td><input type="text" name="password" value=""></td>
    </tr>
    <tr>
        {{csrf_field()}}
        <td colspan="2"><input type="submit" value="确认"></td>
    </tr>
</table>
</form>
</body>
</html>
