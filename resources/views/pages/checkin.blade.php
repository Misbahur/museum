@extends('../layout/' . $layout)

@section('subhead')
<title>Sistem - Booking - Kunjungan Museum Blambangan</title>
@endsection

@section('subcontent')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="w-50 mx-auto text-center justify-content-center py-5 my-5">
            <h2 class="page-title mb-0 text-2xl font-bold">Cari Kode Booking</h2>
            <p class="text-lg font-base text-gray-50 mb-4">Masukan kode Booking pengunjung.</p>
            <div class="col-span-12 lg:col-span-6">
            @include('components.alert')
             </div>
            <form method="get" action="{{ route('checkin') }}" class="flex flex-wrap justify-between lg:flex-row searchform searchform-lg" role="search">
                <div class="input-group mt-2 w-full">
                    <input type="search" name="kode" class="form-control form-control-lg form-control-rounded bg-white pl-5 search-input"  placeholder="Cari Kode Booking" aria-label="Search" aria-describedby="input-group-price" autofocus>
                    <div id="input-group-price" class="input-group-text">
                        <button type="submit" class="flex justify-center btn btn-elevated-rounded-primary w-32">
                            <i data-feather="search" class="w-4 h-4 mr-2"></i> Cari
                        </button>
                    </div>
                </div>                    
            </form>
        </div>
        @if ($booking)
            <div class="mb-5 blank-content w-1/2">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="border-b whitespace-nowrap">Kode Booking</th>
                                <td class="border-b whitespace-nowrap font-bold">{{ $booking->barcode }}</td>
                            </tr>
                            <tr>
                                <th class="border-b whitespace-nowrap">Nama</th>
                                <td class="border-b whitespace-nowrap">{{ $booking->pengunjung->nama }}</td>
                            </tr>
                            <tr>
                                <th class="border-b whitespace-nowrap">Email</th>
                                <td class="border-b whitespace-nowrap">{{ $booking->pengunjung->email }}</td>
                            </tr>
                            <tr>
                                <th class="border-b whitespace-nowrap">Tanggal Kunjungan</th>
                                <td class="border-b whitespace-nowrap">{{ $booking->tanggal_berkunjung }}</td>
                            </tr>
                            <tr>
                                <th class="border-b whitespace-nowrap">Kategori Kunjungan</th>
                                <td class="border-b whitespace-nowrap">{{ $booking->kategori->nama }}</td>
                            </tr>
                            <tr>
                                <th class="border-b whitespace-nowrap">Sesi Kunjungan</th>
                                <td class="border-b whitespace-nowrap">{{ $booking->sesi->nama }}</td>
                            </tr>
                            <tr>
                                <th class="border-b whitespace-nowrap">Jumlah Pengunjung</th>
                                <td class="border-b whitespace-nowrap">{{ $booking->jumlah_pengunjung }}</td>
                            </tr>
                            <tr>
                                <th class="border-b whitespace-nowrap">Status</th>
                                <td class="border-b whitespace-nowrap">{{ $booking->status }}</td>
                            </tr>
                            @if (!empty($booking->doc_persyaratan_id))
                            <tr>
                                <th class="border-b whitespace-nowrap">Dokumen Persyaratans</th>
                                <td class="border-b whitespace-nowrap">{{ $booking->doc_persyaratan_id }}</td>
                            </tr>
                            @endif
                            <tr>
                                <form action="{{ route('checkinselesai', $booking->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="status" value="selesai">
                                        <td class="border-b whitespace-nowrap">
                                            <button type="submit" class="btn btn-success w-32 mr-2 mb-2">
                                            <i data-feather="hard-drive" class="w-4 h-4 mr-2"></i> Proses
                                            </button>
                                        </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="text-center mb-5 blank-content">
                <img src="{{ asset('dist/images/feeling_sad.svg') }}" width="40%"
                    class="my-5 mx-auto d-block nothing-img" alt="">
                <h5>Opps! Tidak ada data untuk ditampilkan</h5>
            </div>
        @endif
    </div>
</div>
@endsection
