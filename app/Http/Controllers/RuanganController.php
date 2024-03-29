<?php

namespace App\Http\Controllers;

use App\ruangan;
use App\User;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = Ruangan::all();
        $user = User::all();
        return view('ruangan.index', compact('ruangan', 'user'));
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
        $input = $request->all();

        $input ['nomor_ruangan'] = 'Ruangan'.' '.random_int(100, 1000);
        
        Ruangan::create($input);
        return redirect()->route('ruangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $user= User::all();
        return view('ruangan.detail', compact('ruangan', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $user = User::all(); 
        return view('ruangan.edit', compact('ruangan', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $ruangan = Ruangan::findOrFail($id);
        $data = $request->all();
        $ruangan->update($data);
        return redirect('/ruangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Ruangan::findOrFail($id);
        $data->delete();
        return back();
    }
}
