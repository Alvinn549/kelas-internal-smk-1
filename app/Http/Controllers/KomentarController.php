<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komentars = Komentar::with(['post', 'user'])->get();

        return view('komentar.index', [
            'komentars' => $komentars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('komentar.create', [
            'dataPostingan' => Post::all(),
            'users' => User::whereDoesntHave('komentar')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'post_id' => ['required', 'exists:posts,id'],
                'user_id' => ['required', 'exists:users,id'],
                'isi' => ['required', 'string']
            ],
            [
                'post_id.required' => 'Postingan harus dipilih',
                'post_id.exists' => 'Postingan tidak ditemukan',

                'user_id.required' => 'User harus dipilih',
                'user_id.exists' => 'User tidak ditemukan',

                'isi.required' => 'Isi komentar harus diisi',
                'isi.string' => 'Isi komentar harus berupa teks'
            ]
        );

        $dataPostingan = Komentar::create($request->all());

        return redirect()
            ->route('komentar.show', $dataPostingan->id)
            ->with('success', 'Komentar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Komentar $komentar)
    {
        return view('komentar.show', [
            'komentar' => $komentar,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komentar $komentar)
    {
        return view('komentar.edit', [
            'dataPostingan' => Post::all(),

            'users' => User::where('id', $komentar->user_id)
                ->orWhereDoesntHave('komentar')
                ->get(),

            'komentar' => $komentar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komentar $komentar)
    {
        $request->validate(
            [
                'post_id' => ['required', 'exists:posts,id'],
                'user_id' => ['required', 'exists:users,id'],
                'isi' => ['required', 'string']
            ],
            [
                'post_id.required' => 'Postingan harus dipilih',
                'post_id.exists' => 'Postingan tidak ditemukan',

                'user_id.required' => 'User harus dipilih',
                'user_id.exists' => 'User tidak ditemukan',

                'isi.required' => 'Isi komentar harus diisi',
                'isi.string' => 'Isi komentar harus berupa teks'
            ]
        );

        $komentar->update($request->all());

        return redirect()
            ->route('komentar.index')
            ->with('success', 'Komentar berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komentar $komentar)
    {
        $komentar->delete();

        return redirect()
            ->route('komentar.index')
            ->with('success', 'Komentar berhasil dihapus');
    }
}
