<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sesis = Sesi::orderBy('created_at', 'desc')->get();
        return view('pages.sesi', ['sesis' => $sesis]);
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
        //
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'waktu_awal' => 'required',
            'waktu_akhir' => 'required',
            'deskripsi' => 'required'
        ]);

        $sesi = new Sesi;
        $sesi->nama = $request->input('nama');
        $sesi->waktu_awal = $request->input('waktu_awal');
        $sesi->waktu_akhir = $request->input('waktu_akhir');
        $sesi->deskripsi = $request->input('deskripsi');
        $sesi->save();


        if($sesi){
            return redirect()->route('sesi')->with(['success' => 'Data sesi'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->route('sesi')->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function show(Sesi $sesi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sesis = Sesi::orderBy('created_at', 'desc')->get();
        $sesi = Sesi::find($id);
        return view('pages.sesiedit', ['sesis' => $sesis, 'sesi' => $sesi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'waktu_awal' => 'required',
            'waktu_akhir' => 'required',
            'deskripsi' => 'required'
        ]);

        $sesi = Sesi::find($id);
        $sesi->nama = $request->input('nama');
        $sesi->waktu_awal = $request->input('waktu_awal');
        $sesi->waktu_akhir = $request->input('waktu_akhir');
        $sesi->deskripsi = $request->input('deskripsi');
        $sesi->update();


        if($sesi){
            return redirect()->route('sesi')->with(['success' => 'Data sesi'.$request->input('nama').'berhasil di perbarui']);
        }else{
            return redirect()->route('sesi')->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sesi = Sesi::find($id);
        $sesi->delete();
     
        return redirect()->route('sesi')
        ->with('success','kategori deleted successfully');
    }
}
