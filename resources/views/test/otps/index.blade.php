<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test OTP</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <input type="string" name="phone" required>
        <input type="submit" value="Kirim OTP">
    </form>
</body>
</html>
