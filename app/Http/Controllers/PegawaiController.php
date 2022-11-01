<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pegawai', [
            'title' => 'Guru dan Staff',
            'data' => Pegawai::all()
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
     * @param  \App\Http\Requests\StorePegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->file('gambar')->getClientOriginalName();
        $nama = $request->input('nama');
        $jabatan = $request->input('jabatan');

        $request->file('gambar')->storeAs('public/pegawai', $gambar);

        $pegawai = new Pegawai();
        $pegawai->name = $nama;
        $pegawai->position = $jabatan;
        $pegawai->imgPath = $gambar;
        $pegawai->save();

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegawaiRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $nama = $request->input('nama');
        $jabatan = $request->input('jabatan');
        $oldImg = $request->input('oldImg');
        $img = '';

        if ($request->file('gambar') != null) {
            $gambar = $request->file('gambar')->getClientOriginalName();
            $img = $gambar;
            $request->file('gambar')->storeAs('public/pegawai', $gambar);
        } else {
            $img = $oldImg;
        }


        Pegawai::where('id', $pegawai->id)
            ->update([
                'name' => $nama,
                'position' => $jabatan,
                'imgPath' => $img
            ]);

        return redirect('/pegawai')->with('success', 'Data Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        Pegawai::destroy($pegawai->id);
        return redirect('/pegawai')->with('success', 'Data Berhasil Dihapus !');
    }
}
