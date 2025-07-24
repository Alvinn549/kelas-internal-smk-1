<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Tambah Data Komentar</h2>
    <a href="{{ route('komentar.index') }}">Kembali</a>
    <br>
    <br>

    <form action="{{ route('komentar.store') }}" method="post">
        @csrf

        <label for="post">Postingan</label>

        <select name="post_id">

            <option value="">Pilih Postingan</option>

            @foreach ($dataPostingan as $post)
                <option @selected($post->id == old('post_id')) value="{{ $post->id }}">{{ $post->judul }}</option>
            @endforeach

        </select>
        @error('post_id')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <br>
        <br>

        <label for="post">User</label>

        <select name="user_id">

            <option value="">Pilih User</option>

            @foreach ($users as $user)
                <option {{ $user->id == old('user_id') ? 'selected' : '' }} value="{{ $user->id }}">
                    {{ $user->name }}
                </option>
            @endforeach

        </select>
        @error('user_id')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <br>
        <br>

        <label for="isi">isi</label>
        <input type="text" name="isi" id="isi" value="{{ old('isi') }}">
        {{-- <textarea name="isi" id="isi" cols="30" rows="10">{{ old('isi') }}</textarea> --}}
        @error('isi')
            <p style="color: red">{{ $message }}</p>
        @enderror

        <button type="submit">Simpan</button>
    </form>
</body>

</html>
