<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validate</title>
</head>
<body>
    <p>Kami telah mengirim OTP 4 Digit ke Whatsapp dengan Nomor {{ $phone }}</p>
    <p>Silahkan Masukkan otp pada form berikut:</p>

    <p>{{ $message }}</p>

    &nbsp;
    &nbsp;
    &nbsp;

    <form action="{{ route('test.validate') }}" method="POST">
        @csrf
        <input type="string" name="otp" required>
        <input type="submit" value="Kirim OTP">
    </form>
</body>
</html>
