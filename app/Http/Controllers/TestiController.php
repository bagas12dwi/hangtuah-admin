<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('testimonials', [
            'title' => 'Testimoni',
            'data' => Testimonial::all(),
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama = $request->input('nama');
        $sekolah = $request->input('sekolah');
        $testimoni = $request->input('testimoni');

        $testimonial = new Testimonial();
        $testimonial->name = $nama;
        $testimonial->school_now = $sekolah;
        $testimonial->testimoni = $testimoni;
        $testimonial->type = "alumni";
        $testimonial->user_id = auth()->user()->id;
        $testimonial->save();

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $nama = $request->input('nama');
        $sekolah = $request->input('sekolah');
        $testimoni = $request->input('testimoni');

        Testimonial::where('id', $id)
            ->update([
                'name' => $nama,
                'school_now' => $sekolah,
                'testimoni' => $testimoni,
                'user_id' => auth()->user()->id
            ]);

        return redirect('/testimoni')->with('success', 'Data Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimoni)
    {
        Testimonial::destroy($testimoni->id);

        return redirect('/testimoni')->with('success', 'Data Berhasil Dihapus !');
    }
}
