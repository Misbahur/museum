<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CaraBoook;
use Illuminate\Http\Request;

class CaraBoookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hajar()
    {
        $caras = CaraBoook::orderBy('created_at', 'ASC')->get();
        // dd($caras);
        return view('cara_booking', ['caras' => $caras]);
    }
    public function index()
    {
        //
        $caras = CaraBoook::orderBy('created_at', 'ASC')->get();
        return view('pages.cara', ['caras' => $caras]);
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
        $request->validate([
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('foto')) {
        $filenameWithExt = $request->file('foto')->getClientOriginalName ();
        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $request->file('foto')->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename. '_'. Carbon::now().'.'.$extension;
        $path = $request->file('foto')->storeAs('Carabook', $fileNameToStore, 'public');
        }
        // Else add a dummy image
        else {
        $path = 'NoImage.jpg';
        }
        // dd($path);

  
        $cara = new CaraBoook;
        $cara->keterangan =  $request->input('keterangan');
        $cara->foto = $path;
        $cara->save();

        if($cara){
            return redirect()->route('datacara')->with(['success' => 'Data Berhasil Terekam!']);
        }else{
            return redirect()->route('datacara')->with(['danger' => 'Data Tidak Terekam!']);
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CaraBoook  $caraBoook
     * @return \Illuminate\Http\Response
     */
    public function show(CaraBoook $caraBoook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CaraBoook  $caraBoook
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $caras = CaraBoook::all();
        $cara = CaraBoook::find($id);
        return view('pages.caraedit', ['cara' => $cara, 'caras' => $caras]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CaraBoook  $caraBoook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'keterangan' => 'required',
            ]);

        if ($request->hasFile('foto')) {
        $filenameWithExt = $request->file('foto')->getClientOriginalName ();
        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $request->file('foto')->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename. '_'. Carbon::now().'.'.$extension;
        $path = $request->file('foto')->storeAs('Carabook', $fileNameToStore, 'public');
        }
        // Else add a dummy image
        else {
        $path = 'NoImage.jpg';
        }
  
        $cara = CaraBoook::find($id);
        $cara->keterangan =  $request->input('keterangan');
        if ($request->file('foto')) {
        $cara->foto = $path;
        }else{
             unset($cara->foto);
        }
        $cara->update();

        if($cara){
            return redirect()->route('datacara')->with(['success' => 'Data Berhasil Terekam!']);
        }else{
            return redirect()->route('datacara')->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CaraBoook  $caraBoook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cara = CaraBoook::find($id);
        $cara->delete();

        return redirect()->route('datacara')->with('success', 'Data berhasil di Hapus');
    }
}
