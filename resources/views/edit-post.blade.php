<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Edit Postingn</h2>

    <a href="/posts">Kembali</a>
    <br><br>

    <form action="/update/{{ $postingan->id }}" method="post">
        @csrf
        @method('PUT')

        <label for="judul">Judul:</label>
        <input type="text" name="judul" value="{{ $postingan->judul }}">

        <br>

        <label for="isi">Isi:</label>
        <textarea name="isi" rows="4">{{ $postingan->isi }}</textarea>

        <br>

        <button type="submit">Simpan</button>
    </form>

</body>

</html>
