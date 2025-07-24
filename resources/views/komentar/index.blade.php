<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Daftar Komentar</h2>

    <a href="{{ route('komentar.create') }}">Tambah Data</a>
    <br>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>Judul Postingan</td>
                <td>Nama Pengomentar</td>
                <td>Isi</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($komentars as $komentar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $komentar->post->judul }}</td>
                    <td>{{ $komentar->user->name }}, {{ $komentar->user->email }}</td>
                    <td>{{ $komentar->isi }}</td>
                    <td>
                        <a href="{{ route('komentar.edit', $komentar->id) }}">Edit</a>

                        <a href="{{ route('komentar.show', $komentar->id) }}">Detail</a>

                        <form action="{{ route('komentar.destroy', $komentar->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Tidak ada komentar</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
