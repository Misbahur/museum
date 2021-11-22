@extends('../layoutfront/app')

@section('content')

    <section class="mx-auto w-full lg:items-center lg:py-40">
        <div class="container mx-auto pt-10 lg:pt-0">
            <div class="justify-center">
                <h1 class="font-extrabold text-gray-700 text-center text-4xl">Cek Kode Booking Kunjungan Museum
                    Blambangan</h1>
                <p class="font-base text-gray-500 text-center text-xl my-4">Anda bisa melakukan cek status booking
                    Museum Blambangan disini, <br> Pastikan status booking sudah disetujui sebelunm berkunjung!</p>
                <div class="mx-auto mt-6 bg-transparent border rounded-md dark:border-gray-700 lg:w-2/3 focus-within:border-blue-500 focus-within:ring focus-within:ring-blue-600 dark:focus-within:border-blue-500 focus-within:ring-opacity-40">
                    <form method="get" action="{{ route('cekkode') }}" class="flex flex-wrap justify-between lg:flex-row">
                        <input type="search" name="kode" placeholder="Masukan Kode Booking disni" required="required"
                            class="flex-1 h-10 px-4 m-1 text-gray-700 placeholder-gray-400 bg-transparent border-none appearance-none lg:h-12 dark:text-gray-200 focus:outline-none focus:placeholder-transparent focus:ring-0">
                        <button type="submit"
                            class="flex items-center justify-center w-full p-2 m-1 text-white transition-colors duration-200 transform rounded-md lg:w-12 lg:h-12 lg:p-0 bg-blue-400 hover:bg-blue-300 focus:outline-none focus:bg-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            @if ($booking)
                <div class="grid grid-cols-2 gap-4 justify-beetwen py-4 px-10">
                    <div class="justify-end">
                        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-md bg-white mt-4">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-4 max-w-full flex-grow">
                                        <h3 class="font-semibold text-base text-blueGray-700">
                                            Detail Booking
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full border-collapse text-blueGray-700  ">
                                    <thead class="thead-light ">
                                        <tr>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Kode Booking
                                            </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                {{ $booking->barcode }}
                                            </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                Status Booking
                                            </th>
                                            @if ($booking->status == 'belum')
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 bg-yellow-300 uppercase font-bold">
                                                {{ $booking->status }}
                                            </td>
                                            @elseif($booking->status == 'sudah')
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 bg-green-300 uppercase font-bold">
                                                {{ $booking->status }}
                                            </td>
                                            @else
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 bg-blue-300 uppercase font-bold">
                                                {{ $booking->status }}
                                            </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                Nama 
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $booking->pengunjung->nama }}
                                            </td>
                                        </tr>
                                         <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                Email 
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $booking->pengunjung->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                Jumlah Pengunjung
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $booking->jumlah_pengunjung }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                Tanggal Berkunjung
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $booking->tanggal_berkunjung }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                Kategori Kunjungan
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $booking->kategori->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                Sesi Kunjungan
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $booking->sesi->nama }}&nbsp{{ $booking->sesi->waktu_awal }}-{{ $booking->sesi->waktu_akhir }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                Alamat Pengunjung
                                            </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                {{ $booking->pengunjung->alamat }}
                                        </tr>
                                        @if ($booking->jumlah_pengunjung >= 2)
                                            <tr>
                                                <th
                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                    Masukan data anggota 
                                                </th>
                                                <td     
                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    <button class="px-4 py-2 font-bold text-white bg-blue-400 hover:bg-blue-300 rounded-full focus:outline-none focus:shadow-outline focus:bg-blue-300">Tambah Anggota</button>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="justify-start">
                        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-md bg-white mt-4">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-4 max-w-full flex-grow">
                                        <h3 class="font-semibold text-base text-blueGray-700">
                                            Qrcode / Tiket Elektronik
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full border-collapse text-blueGray-700  ">
                                    <tbody>
                                        <div class="flex justify-center py-4">
                                            {!! QrCode::size(250)->generate($booking->barcode); !!}
                                        </div>
                                    </tbody>
                                    <tfoot class="thead-light ">
                                        <tr>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Kode Booking
                                            </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                MSBL20211102100
                                            </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="text-center mb-5 blank-content">
                <img src="{{ asset('dist/images/feeling_sad.svg') }}" width="40%"
                    class="my-5 mx-auto d-block nothing-img" alt="">
                <h5>Opps! Tidak ada data untuk ditampilkan</h5>
            </div>
            @endif
            <p class="bg-green-300 text-gray-800 rounded-md mx-auto text-center text-xl py-2 px-2 mx-2">Validasi Booking dilakukan hanya
                        di jam kerja / pukul 07:00-15:00</p>
        </div>
    </section>

@endsection