<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Transaksi;
use App\Models\Sesi;
use App\Models\Kategori;
use App\Models\Pengunjung;
use App\Models\doc_persyaratan;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingMail;
use Symfony\Component\HttpFoundation\Response;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function book()
    {
        $kategoris = Kategori::all();
        $sesis = Sesi::all();
        $mintanggal = Carbon::now()->format('Y-m-d');
        return view('home', ['kategoris' => $kategoris, 'sesis' => $sesis, 'mintanggal' => $mintanggal]);
    }

    public function cekkode(Request $request)
    {
        $booking = '';
        if($request->input('kode') != ''){
            $booking = Transaksi::where('barcode', $request->input('kode'))->first();
        }
        return view('cek_booking', ['booking' => $booking]);
    }

    public function index()
    {
        //
        $bookings = Transaksi::orderBy('tanggal_berkunjung', 'ASC')->paginate(15);
        return view('pages.daftarbooking', ['bookings' => $bookings]);
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
            'email' => 'required|email',
            'alamat' => 'required|min:3',
            'jumlah_orang' => 'required|numeric|max:50|min:1',
            'tanggal_berkunjung' => 'required',
            'kategori' => 'required',
            'sesi' => 'required'
        ]);

        // Insert Pengunjung
        $pengunjung = ([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);
        $pengunjung_id = Pengunjung::create($pengunjung)->id;

        $cekbooking = Transaksi::whereDate('tanggal_berkunjung', date('Y-m-d', strtotime($request->tanggal_berkunjung)))->count();
        $cekbooking = $cekbooking+1;
        $barcode = 'MBLB'.date("Ymd",strtotime($request->tanggal_berkunjung)).$cekbooking;

        if($request->hasFile('doc')) {
        $filenameWithExt = $request->file('doc')->getClientOriginalName ();
        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $request->file('doc')->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename. '_'. Carbon::now().'.'.$extension;
        $path = $request->file('doc')->storeAs('Document', $fileNameToStore, 'public');
         $doc = ([
            'doc' => $path,
            'kategori_id' => $request->input('kategori') 
            ]);
        $doc_id = doc_persyaratan::create($doc)->id;
        
        }

        // dd($barcode);
        if ($request->hasFile('doc')) {
            $booking = ([
            'kategori_id' => $request->input('kategori'),
            'sesi_id' => $request->input('sesi'),
            'pengunjung_id' => $pengunjung_id,
            'doc_persyaratan_id' => $doc_id,
            'barcode' => $barcode,
            'tanggal_berkunjung' => $request->input('tanggal_berkunjung'),
            'jumlah_pengunjung' => $request->input('jumlah_orang'),
            'status' => 'belum'
            ]);
        }
        else{
            $booking = ([
            'kategori_id' => $request->input('kategori'),
            'sesi_id' => $request->input('sesi'),
            'pengunjung_id' => $pengunjung_id,
            'barcode' => $barcode,
            'tanggal_berkunjung' => $request->input('tanggal_berkunjung'),
            'jumlah_pengunjung' => $request->input('jumlah_orang'),
            'status' => 'belum'
            ]);
        }
        $booking = Transaksi::create($booking)->id;

        $mailData = [
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'kategori' => $request->input('kategori'),
            'sesi' => $request->input('sesi'),
            'pengunjung_id' => $pengunjung_id,
            'barcode' => $barcode,
            'tanggal_berkunjung' => $request->input('tanggal_berkunjung'),
            'jumlah_pengunjung' => $request->input('jumlah_orang'),
            'status' => 'belum'
        ];
        // $qrcode = QrCode::size(250)->generate($barcode);
        Mail::to($request->input('email'))->send(new BookingMail($mailData));

        if($booking){
            return redirect()->route('booking')->with(['success' => 'Data Booking An. '.$request->input('nama').' berhasil terekam oleh server'.' Kode Booking anda '.$barcode]);
        }else{
            return redirect()->route('booking')->with(['danger' => 'Data Tidak Terekam!']);
        }
        // dd($cekbooking);
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
        $sesis = Sesi::all();
        $booking = Transaksi::find($id);
        return view('pages.daftarbookingedit', ['booking' => $booking, 'sesis' => $sesis]);
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
        $request->validate([
            'tanggal_berkunjung' => 'required',
            'jumlah' => 'required',
            'status' => 'required'
        ]);

        $booking = Transaksi::find($id);
        $booking->tanggal_berkunjung = $request->input('tanggal_berkunjung');
        $booking->jumlah_pengunjung =  $request->input('jumlah');
        $booking->status = $request->input('status');
        if($request->input('sesi')){
            $booking->sesi_id = $request->input('sesi');
        }else{
            unset($booking->sesi_id);
        }
        $booking->update();

        if($booking){
            return redirect()->route('daftarbooking')->with(['success' => 'Data Berhasil Di update!']);
        }else{
            return redirect()->route('daftarbooking')->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $booking = Transaksi::find($id);
        $booking->delete();
     
        return redirect()->route('daftarbooking')
        ->with('success','Data Booking deleted successfully');
    }
}
