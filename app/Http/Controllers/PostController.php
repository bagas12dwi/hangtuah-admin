<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request as HttpRequest;

class PostController extends Controller
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
            'data' => Post::all()
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
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HttpRequest $request)
    {
        $gambar = $request->file('gambar')->getClientOriginalName();
        $nama = $request->input('nama');
        $deskripsi = $request->input('content');

        $request->file('gambar')->storeAs('public/berita', $gambar);

        $berita = new Post();
        $berita->title = $nama;
        $berita->description = $deskripsi;
        $berita->imgPath = $gambar;
        $berita->save();

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(HttpRequest $request, Post $post)
    {
        $nama = $request->input('nama');
        $deskripsi = $request->input('content');
        $oldImg = $request->input('oldImg');
        $img = '';


        if ($request->file('gambar') != null) {
            $gambar = $request->file('gambar')->getClientOriginalName();
            $img = $gambar;
            $request->file('gambar')->storeAs('public/berita', $gambar);
        } else {
            $img = $oldImg;
        }

        Post::where('id', $post->id)
            ->update([
                'title' => $nama,
                'description' => $deskripsi,
                'imgPath' => $img
            ]);

        return redirect('/post')->with('success', 'Data Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/post')->with('success', 'Data Berhasil Dihapus !');
    }
}
