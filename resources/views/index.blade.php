<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Index</title>
</head>
<body>
	<a href='logout'>ログアウト</a>
  <ul>
    @foreach($users as $u)
      <li>{{$u->user_id}} : {{$u->name}}</li>
    @endforeach
  </ul>
</body>
</html>