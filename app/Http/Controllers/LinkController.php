<?php

namespace App\Http\Controllers;

use App\Models\link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $links = link::all();
        return view('pages.link', ['links' => $links]);
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
            'nama' => 'required',
            'title' => 'required',
            'link' => 'required',
        ]);

        $link = new link;
        $link->nama = $request->input('nama');
        $link->title = $request->input('title');
        $link->link = $request->input('link');
        $link->save();

        if($link){
            return redirect()->route('datalink')->with(['succes' => 'Data Berhasil Terekam!']);
        }else{
            return redirect()->route('datalink')->with(['danger' => 'Data Tidak Terekam!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $links = link::all();
        $link = link::find($id);

        return view('pages.linkedit', ['links' => $links, 'link' => $link]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'title' => 'required',
            'link' => 'required',
        ]);

        $link = link::find($id);
        $link->nama = $request->input('nama');
        $link->title = $request->input('title');
        $link->link = $request->input('link');
        $link->update();

        if($link){
            return redirect()->route('datalink')->with(['succes' => 'Data Berhasil Terekam!']);
        }else{
            return redirect()->route('datalink')->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $link = link::find($id);
        $link->delete();

        return redirect()->route('datalink')->with('success', 'Data Berhasil dihapus ya guys ya');
    }
}
