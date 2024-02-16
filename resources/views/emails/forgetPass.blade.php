<html>
<head>
    <title>Forget password</title>
</head>
<body>
    <a href="{{ url('forget-password/'.$data['email'].'/'.$data['token']) }}">Click to Reset </a>
    <p>{{ url('forget-password/'.$data['email'].'/'.$data['token']) }}</p>
</body>
</html>
