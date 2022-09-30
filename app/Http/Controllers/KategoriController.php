<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategoris = Kategori::orderBy('created_at', 'desc')->get();
        return view('pages.kategori', ['kategoris' => $kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.kategori')->with(['info' => 'Tambah Data di samping tuh!']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'doc' => 'required',
            'harga' => 'required'
        ]);

        $kategori = new Kategori;
        $kategori->nama = $request->input('nama');
        $kategori->jenis = $request->input('jenis');
        $kategori->doc = $request->input('doc');
        $kategori->harga = $request->input('harga');
        $kategori->save();


        if($kategori){
            return redirect()->route('kategori')->with(['success' => 'Data Kategori'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->route('kategori')->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategoris = Kategori::orderBy('created_at', 'desc')->get();
        $kategori = Kategori::find($id);
        return view('pages.kategoriedit', ['kategori' => $kategori, 'kategoris' => $kategoris]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'doc' => 'required',
            'harga' => 'required',
        ]);

        $kategori = Kategori::find($id);
        $kategori->nama = $request->input('nama');
        $kategori->jenis = $request->input('jenis');
        $kategori->doc = $request->input('doc');
        $kategori->harga = $request->input('harga');
        $kategori->update();


        if($kategori){
            return redirect()->route('kategori')->with(['success' => 'Data Kategori'.$request->input('nama').'berhasil di perbarui']);
        }else{
            return redirect()->route('kategori')->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kategori = Kategori::find($id);
        $kategori->delete();
     
        return redirect()->route('kategori')
        ->with('success','kategori deleted successfully');
    }
}
