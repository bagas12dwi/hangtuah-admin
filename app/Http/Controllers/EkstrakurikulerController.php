<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Http\Requests\StoreEkstrakurikulerRequest;
use App\Http\Requests\UpdateEkstrakurikulerRequest;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ekstrakurikuler', [
            'title' => 'Ekstrakurikuler',
            'data' => Ekstrakurikuler::all()
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
     * @param  \App\Http\Requests\StoreEkstrakurikulerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->file('gambar')->getClientOriginalName();
        $nama = $request->input('nama');
        $deskripsi = $request->input('deskripsi');

        $request->file('gambar')->storeAs('public/ekstrakurikuler', $gambar);

        $ekstrakurikuler = new Ekstrakurikuler();
        $ekstrakurikuler->ekstrakurikuler_name = $nama;
        $ekstrakurikuler->description = $deskripsi;
        $ekstrakurikuler->imgPath = $gambar;
        $ekstrakurikuler->save();

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function show(Ekstrakurikuler $ekstrakurikuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEkstrakurikulerRequest  $request
     * @param  \App\Models\Ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $gambar = $request->file('gambar')->getClientOriginalName();
        $nama = $request->input('nama');
        $deskripsi = $request->input('deskripsi');

        $request->file('gambar')->storeAs('public/ekstrakurikuler', $gambar);

        Ekstrakurikuler::where('id', $ekstrakurikuler->id)
            ->update([
                'ekstrakurikuler_name' => $nama,
                'description' => $deskripsi,
                'imgPath' => $gambar
            ]);

        return redirect('/ekstrakurikuler')->with('success', 'Data Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ekstrakurikuler  $ekstrakurikuler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        Ekstrakurikuler::destroy($ekstrakurikuler->id);
        return redirect('/ekstrakurikuler')->with('success', 'Data Berhasil Dihapus !');
    }
}
