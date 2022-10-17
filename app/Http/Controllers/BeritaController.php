<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('berita', [
            'title' => 'Berita',
            'data' => Berita::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBeritaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->file('gambar')->getClientOriginalName();
        $nama = $request->input('nama');
        $deskripsi = $request->input('content');

        $request->file('gambar')->storeAs('public/berita', $gambar);

        $berita = new Berita();
        $berita->title = $nama;
        $berita->description = $deskripsi;
        $berita->imgPath = $gambar;
        $berita->save();

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBeritaRequest  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        $gambar = $request->file('gambar')->getClientOriginalName();
        $nama = $request->input('nama');
        $deskripsi = $request->input('content');

        $request->file('gambar')->storeAs('public/berita', $gambar);

        Berita::where('id', $berita->id)
            ->update([
                'title' => $nama,
                'description' => $deskripsi,
                'imgPath' => $gambar
            ]);

        return redirect('/berita')->with('success', 'Data Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        //
    }
}
