<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <a href="{{ route('komentar.index') }}">Kembali ke Daftar Komentar</a>

    <h3>{{ $komentar->post->judul }}</h3>
    <h3>{{ $komentar->user->name }}</h3>
    <h3>{{ $komentar->isi }}</h3>
</body>

</html>
