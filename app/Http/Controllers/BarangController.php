<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Kategori;
use App\Ruangan;
use App\User;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori  = Kategori::all();
        $barang = Barang::all();
        $ruangan = Ruangan::all();
        $user = User::all();
        return view('barang.index', compact('barang', 'kategori', 'ruangan', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if($request->hasFile('gambar'))
        {
            $destination_path = 'public/images/barang';
            $image = $request->file('gambar');
            $image_name = time()."_".$image->getClientOriginalName();
            $path = $request->file('gambar')->storeAs($destination_path, $image_name);
            $input['gambar'] = $image_name;
        }
        
        Barang::create($input);
        return redirect('/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori= Kategori::all();
        $ruangan= Ruangan::all();
        $user = User::all();
        return view('barang.detail', compact('barang', 'kategori', 'ruangan' , 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $ruangan = Ruangan::all();
        $user = User::all();
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('kategori', 'ruangan', 'barang', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $data = $request->all();
        $barang->update($data);
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::findOrFail($id);
        $data->delete();
        return redirect('/barang');
    }
}
