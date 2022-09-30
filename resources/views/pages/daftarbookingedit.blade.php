@extends('../layout/' . $layout)

@section('subhead')
    <title>Sistem - Booking - Kunjungan Museum Blambangan</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Edit Booking Pengunjung Musemum</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form method="POST" enctype="multipart/form-data" action="{{ route('bookingupdate', $booking->id) }}" >
                @csrf
                <div>
                    <label for="crud-form-1" class="form-label">Kode Booking</label>
                    <input id="crud-form-1" disabled name="kode" type="text" value="{{ $booking->barcode }}" class="form-control w-full">
                </div>
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Nama Pengunjung</label>
                    <input id="crud-form-1" disabled name="nama" type="text" value="{{ $booking->pengunjung->nama }}" class="form-control w-full" placeholder="Nama Pengunjung">
                </div>
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Email Pengunjung</label>
                    <input id="crud-form-1" disabled name="email" type="emial" value="{{ $booking->pengunjung->email }}" class="form-control w-full" placeholder="Email Pengunjung">
                </div>
                <div class="mt-3">
                    <label class="form-label">Informasi</label>
                    <div class="sm:grid grid-cols-3 gap-2">
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">Tanggal</div>
                            <input type="date" name="tanggal_berkunjung" value="{{ $booking->tanggal_berkunjung }}" class="form-control" placeholder="Unit" aria-describedby="input-group-3">
                        </div>
                        <div class="input-group mt-2 sm:mt-0">
                            <div id="input-group-3" class="input-group-text">Kategori</div>
                            <input type="text" disabled name="kategori" value="{{ $booking->kategori->nama }}" class="form-control" placeholder="Unit" aria-describedby="input-group-3">
                        </div>
                        <div class="input-group mt-2 sm:mt-0">
                            <div id="input-group-3" class="input-group-text">Sesi</div>
                            <select name="sesi" class="tail-select w-full">
                                    <option selected disabled>-- Pilih Sesi --</option>
                                @foreach ($sesis as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-3 sm:grid grid-cols-2 gap-2">
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">Jumlah</div>
                            <input type="number" name="jumlah" value="{{ $booking->jumlah_pengunjung }}" class="form-control" placeholder="Unit" aria-describedby="input-group-3">
                        </div>
                        <div class="input-group mt-2 sm:mt-0">
                            <div id="input-group-4" class="input-group-text">Status</div>
                            <select name="status" class="tail-select w-full">
                                <option selected disabled>-- Pilih Status --</option>
                                <option value="belum" {{ $booking->status == 'belum' ? 'selected' : ''}}>Belum verif</option>
                                <option value="sudah" {{ $booking->status == 'sudah' ? 'selected' : ''}}>Sudah verif</option>
                                <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : ''}}>Selesai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-5">
                    <a href="{{ route('daftarbooking') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection