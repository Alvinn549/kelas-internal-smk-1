<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Tambah Postingn</h2>

    <a href="/posts">Kembali</a>
    <br><br>

    <form action="/store" method="post">
        @csrf

        <label for="judul">Judul:</label>
        <input type="text" name="judul">

        <br>

        <label for="isi">Isi:</label>
        <textarea name="isi" rows="4"></textarea>

        <br>

        <button type="submit">Simpan</button>
    </form>

</body>

</html>
