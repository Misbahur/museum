<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $socials = Social::all();
        return view('pages.social', ['socials' => $socials]);
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
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'link' => 'required'
        ]);


        if ($request->hasFile('logo')) {
        $filenameWithExt = $request->file('logo')->getClientOriginalName ();
        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $request->file('logo')->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename. '_'. Carbon::now().'.'.$extension;
        $path = $request->file('logo')->storeAs('Social', $fileNameToStore, 'public');
        }
        // Else add a dummy image
        else {
        $path = 'NoImage.jpg';
        }
        // dd($path);

  
        $social = new Social;
        $social->nama =  $request->input('nama');
        $social->logo = $path;
        $social->title =  $request->input('title');
        $social->link = $request->input('link');
        $social->save();

        if($social){
            return redirect()->route('datasocial')->with(['success' => 'Data Berhasil Terekam!']);
        }else{
            return redirect()->route('datasocial')->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $socials = Social::all();
        $social = Social::find($id);
        return view('pages.socialedit', ['social' => $social, 'socials' => $socials]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'title' => 'required',
            'link' => 'required'
            ]);

        if ($request->hasFile('logo')) {
        $filenameWithExt = $request->file('logo')->getClientOriginalName ();
        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $request->file('logo')->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename. '_'. Carbon::now().'.'.$extension;
        $path = $request->file('logo')->storeAs('Social', $fileNameToStore, 'public');
        }
        // Else add a dummy image
        else {
        $path = 'NoImage.jpg';
        }
  
        $social = Social::find($id);
        $social->nama =  $request->input('nama');
        if ($request->file('logo')) {
        $social->logo = $path;
        }else{
             unset($social->logo);
        }
        $social->title = $request->input('title');
        $social->link = $request->input('link');
        $social->update();

        if($social){
            return redirect()->route('datasocial')->with(['success' => 'Data Berhasil Terekam!']);
        }else{
            return redirect()->route('datasocial')->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $social = Social::find($id);
        $social->delete();

        return redirect()->route('datasocial')->with('success', 'Data berhasil di Hapus');
    }
}
