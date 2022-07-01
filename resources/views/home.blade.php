@extends('../layoutfront/app')

@section('content')

    <section class="mx-auto w-full lg:items-center" id="beranda">
        <div class="w-full">
            <img class=" " src="{{ asset('dist/images/4788.jpg') }}" alt="">
        </div>
    </section>

    <section data-aos="zoom-in-up" data-aos-duration="500" class="mx-auto w-full px-4 pb-10 bg-white lg:space-x-8 lg:flex lg:items-center bg-gray-50">
        <!-- Container -->
        <div class="container mx-auto lg:-mt-40 mt-0 pt-10 lg:pt-0">
            <div class="flex justify-center">
                <!-- Row -->
                <div class="w-full xl:w-3/4 lg:w-full flex shadow-2xl">
                    <!-- Col -->
                    <div class="w-full h-450 bg-gray-400 hidden lg:block lg:w-4/12 bg-cover rounded-tl-lg"
                        style="background-image: url({{ asset('dist/images/heading.jpg') }})">
                    </div>
                    <!-- Col -->
                    <div class="w-full lg:w-8/12 bg-gray-50 p-5 rounded-tr-lg lg:rounded-l-none">
                        <h3 class="pt-4 text-2xl text-center">Booking Kunjungan disini!</h3>
                        <form method="POST" action="{{ route('booknow') }}" enctype="multipart/form-data" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                            @csrf
                            <div class="mb-4 lg:flex lg:justify-between">
                                <div data-aos="fade-down" data-aos-delay="100" class="w-full lg:w-4/6 lg:mx-6">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="nama">
                                        Nama
                                    </label>
                                    <input
                                        class="@error('nama')
                                            is-invalid
                                        @enderror focus:ring-1 focus:ring-light-red-300 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 px-5"
                                        id="nama" name="nama" type="text" placeholder="Nama" />
                                        @error('nama')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>
                                <div data-aos="fade-down" data-aos-delay="200" class="w-full lg:w-2/6 lg:mx-6">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="Jumlah orang">
                                        Jumlah Orang
                                    </label>
                                    <input
                                        class="@error('jumlah_orang')
                                            is-invalid
                                        @enderror focus:border-light-red-300 focus:ring-1 focus:ring-light-red-300 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 px-5"
                                        id="Jumlah orang" name="jumlah_orang" min="1" max="50" type="number" placeholder="Jumlah orang" />
                                        @error('jumlah_orang')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="mb-4 lg:flex lg:justify-between">
                            <div data-aos="fade-down" data-aos-delay="300" class="w-full lg:mx-6">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                    Email
                                </label>
                                <input
                                    class="@error('email')
                                            is-invalid
                                        @enderror focus:border-light-red-300 focus:ring-1 focus:ring-light-red-300 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 px-5"
                                    id="email" name="email" type="email" placeholder="Email" />
                                    @error('email')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                {{ $message }}
                                            </span>
                                        @enderror
                            </div> 
                            <div data-aos="fade-down" data-aos-delay="400" class="w-full lg:mx-6">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                    Kategori Kunjungan
                                </label>
                                <select id="Categorychoice" name="kategori" onChange="check(this);" class="@error('kategori')
                                            is-invalid
                                        @enderror focus:border-light-red-300 focus:ring-1 focus:ring-light-red-300 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 px-5" aria-label="Kategori Kunjungan">
                                <option id="tidak" selected disabled>-- Pilih Kategori --</option>
                                @foreach ($kategoris as $item)
                                    <option id="{{ $item->doc }}" value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                                </select>
                                @error('kategori')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                {{ $message }}
                                            </span>
                                        @enderror
                            </div>                              
                            </div>
                            <div class="mb-4 lg:flex lg:justify-between">
                                <div data-aos="fade-down" data-aos-delay="500" class="w-full lg:mx-6">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="tanggal_kunjungan">
                                        Tanggal Kunjungan
                                    </label>
                                    <input
                                        class="@error('tanggal_berkunjung')
                                            is-invalid
                                        @enderror focus:border-light-red-300 focus:ring-1 focus:ring-light-red-300 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 px-5"
                                        id="tanggal_kunjungan" name="tanggal_berkunjung" type="date" min="{{ $mintanggal }}" placeholder="Tanggal Kunjungan" />
                                    @error('tanggal_berkunjung')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>
                                <div data-aos="fade-down" data-aos-delay="600" class="w-full lg:mx-6">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="sesi">
                                        Sesi Kunjungan
                                    </label>
                                    <select id="sesi" name="sesi" onChange="check(this);" class="@error('sesi')
                                            is-invalid
                                        @enderror focus:border-light-red-300 focus:ring-1 focus:ring-light-red-300 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 px-5" aria-label="Sesi Kunjungan Museum">
                                    <option selected disabled>-- Pilih Sesi --</option>
                                    @foreach ($sesis as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                    </select>
                                    @error('sesi')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1000" id="doc" class="mb-4 lg:mx-6">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="doc">
                                    Document Pendukung
                                </label>
                                <input
                                    class="@error('doc')
                                            is-invalid
                                        @enderror focus:border-light-red-300 focus:ring-1 focus:ring-light-red-300 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 px-5"
                                     type="file" name="doc" placeholder="Document Pendukung" />
                                     @error('doc')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                {{ $message }}
                                            </span>
                                        @enderror
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1500" class="mb-4 lg:mx-6">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="alamat">
                                    Alamat
                                </label>
                                <textarea class="@error('alamat')
                                            is-invalid
                                        @enderror focus:border-light-red-300 focus:ring-1 focus:ring-light-red-300 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-5 px-5" name="alamat" id="alamat" cols="90" rows="5"></textarea>
                                @error('alamat')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                {{ $message }}
                                            </span>
                                        @enderror
                            </div>
                            <div class="mb-6 text-center lg:mx-6">
                                <button
                                    class="w-full px-4 py-2 font-bold text-white bg-blue-400 hover:bg-blue-300 rounded-full focus:outline-none focus:shadow-outline focus:bg-blue-300"
                                    type="submit">
                                    Booking Sekarang
                                </button>
                            </div>
                            <hr class="mb-6 border-t" />
                            <div class="text-center">
                                @if (session('success'))
                                <div class="bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md" role="alert">
                                    <div class="flex">
                                        <div class="py-1"><svg class="fill-current h-6 w-6 text-blue-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                        <div>
                                        <p class="font-bold">{{ session('success') }}</p>
                                        {{-- <p class="text-sm">Make sure you know how these changes affect you.</p> --}}
                                        </div>
                                    </div>
                                </div>
                                @endif
                                {{-- <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                    href="./index.html">
                                    Already have an account? Login!
                                </a> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-9/12 p-5 mx-auto rounded-b-lg invisible lg:visible" style="background: #F5CA7B">
                <p class="hidden">hai</p>
            </div>
        </div>
    </section>

    <section class="w-full py-10 mx-auto lg:h-128 lg:space-x-8 lg:flex lg:items-center s2" id="tentang">
        <div data-aos="fade-up-right" data-aos-duration="6000"
            class="container mx-auto lg:pl-40 lg:mx-auto text-center lg:text-left lg:w-2/5 lg:-mt-8 py-10">
            <h1 class="text-3xl leading-snug text-gray-800 dark:text-gray-200 lg:text-4xl lg:ml-20">
                Tentang <span class="font-semibold lg:block" style="color: #F5CA7B">Museum Blambangan</span></h1>
            <img src="{{ asset('dist/images/example-scene-3.svg') }}" alt="web designer"
                class="w-full h-full max-w-md mx-auto">
        </div>
        <div data-aos="fade-up-left" data-aos-duration="6000"
            class="container mx-auto lg:pr-40 mt-4 lg:mx-8 lg:mt-0 lg:w-3/5">
            <p class="text-grey-700 font-base font-extralight text-center lg:text-left my-4">
                Sejak awal museum didirikan dengan misi utama melestarikan dan mengembangkan sumberdaya arkeologi untuk
                merekontruksi pemahaman sejarah lokal yang lebih mapan. Sasaran utamanya adalah masyarakat, khususnya
                generasi milenial yang merindukan suasana belajar sejarah dengan konsep santai, serius, dan rekreatif.
            </p>

            <p class="text-grey-700 font-base font-extralight text-center lg:text-left my-4">
                Sebagai ruang edukasi Museum Blambangan dikembangkan menjadi lembaga yang mampu menyediakan data-data
                Cagar Budaya di Kabupaten Banyuwangi secara lengkap dan dapat dipertanggung jawabkan.
            </p>
        </div>
    </section>

    <section class="w-full px-4 py-10 mx-auto lg:h-128 lg:space-x-8 lg:flex lg:items-center bg-white" id="digitalisasi">
        <div data-aos="fade-up-right" data-aos-duration="6000"
            class="container mx-auto lg:pl-40 lg:mx-auto text-center lg:text-left lg:w-2/5 lg:-mt-8 py-10">
            <h1 class="text-3xl leading-snug text-gray-800 dark:text-gray-200 lg:text-4xl lg:ml-20">
                Tentang <span class="font-semibold lg:block" style="color: #F5CA7B">Digitalisasi Museum
                    Blambangan</span></h1>
            <img src="{{ asset('dist/images/example-scene-2.svg') }}" alt="web designer"
                class="w-full h-full max-w-md mx-auto">
        </div>
        <div data-aos="fade-up-left" data-aos-duration="6000"
            class="container mx-auto lg:pr-40 mt-4 lg:mx-8 lg:mt-0 lg:w-3/5">
            <p class="text-grey-700 font-base font-extralight text-center lg:text-left my-4">
                Pasca dibuka kembali <strong>Museum Blambangan</strong> telah siao dengan sejumlah norma kesiapan baru.
                Selain kunjungan yang dibatasi, kami juga menerapkan aplikasi <strong>Sijamuwangi</strong> lengkapnya
                <i>Sistem Informasi Sejarah dan Museum Banyuwangi. Guna Menyediakan informasi benda-benda koleksi museum
                    dengan cara yang menarik kepada pengunjung.</i>
            </p>

            <p class="text-grey-700 font-base font-extralight text-center lg:text-left my-4">
                Aplikasi ini dapat diundu melalui link berikut <a
                    class="absoulute inset-0 transition-colors duration-200 transform rounded-md lg:w-12 lg:h-12 lg:p-0 hover:bg-red-300 focus:outline-none focus:bg-red-300"
                    href="#" style="background: #F5CA7B; hover:#f3ca7e">Download Apliaski Sijamuwangi</a>
            </p>
        </div>
    </section>

    <section class="w-full px-4 lg:px-52 s2 pt-10 mx-auto lg:h-128 lg:py-4 lg:space-x-8 lg:flex lg:items-center bg-white" id="informasi">
        <div data-aos="fade-up-right" data-aos-duration="6000" class="mx-auto lg:mx-auto">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Pusat Informasi Museum Blambangan
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Jadwal, email, serta ketentuan.
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Nama Instansi
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                Museum Blambangan
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Jadwal lengkap
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <ul class="list-inside">
                                    <li>Senin - Kamis (08.00 - 15.30)</li>
                                    <li>Jum'at (08.00 - 14.30)</li>
                                </ul>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Email
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                jingga.banyuwangi@gmail.com
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Ketentuan
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <ul class="list-inside">
                                    <li>Setiap Pengunjung harus melakukan booking online sebelum berkungjung ke Museum Blambangan</li>
                                    <li>Mematuhi protokol kesehatan covid-19 dan memindai Qr-code Peduli Lindungi yang tersedia di lokasi</li>
                                </ul>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

        </div>
        <div data-aos="fade-up-left" data-aos-duration="6000" class="mx-auto lg:mx-auto py-4">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Google Maps 
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Museum Blambangan.
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=320&amp;hl=en&amp;q=museum blambangan&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fnfgo.com/">FNF Online</a></div><style>.mapouter{position:relative;text-align:right;width:600px;height:320px;}.gmap_canvas {overflow:hidden;background:none!important;width:600px;height:320px;}.gmap_iframe {width:600px!important;height:320px!important;}</style></div>
                    </dl>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl container px-4 py-10 mx-auto lg:h-128 lg:space-x-8 lg:flex lg:items-center">
        <div data-aos="fade-up-right" data-aos-duration="6000"
            class="w-full text-center lg:text-left lg:w-1/2 lg:-mt-8">
            <h1 class="text-3xl leading-snug text-gray-800 dark:text-gray-200 lg:text-4xl">
                Museum <span class="font-semibold">Blambangan</span> Untuk Masyarakat !<br class="hidden lg:block">
                Belajar Sejarah <span class="text-red-500">Banyuwangi</span></h1>
            <p class="mt-4 text-lg text-gray-500 dark:text-gray-300">Jika anda berkenan mendapatkan informasi dari kami
                <br class="hidden lg:block">Masukan Email anda disini, kami akan mengirimkan kabar menarik ke alamat
                email anda!</p>
            <div
                class="mt-6 bg-transparent border rounded-md dark:border-gray-700 lg:w-2/3 focus-within:border-blue-500 focus-within:ring focus-within:ring-blue-600 dark:focus-within:border-blue-500 focus-within:ring-opacity-40">
                <form action="/search" class="flex flex-wrap justify-between lg:flex-row">
                    <input type="email" name="query" placeholder="Alamat Email" required="required"
                        class="flex-1 h-10 px-4 m-1 text-gray-700 placeholder-gray-400 bg-transparent border-none appearance-none lg:h-12 dark:text-gray-200 focus:outline-none focus:placeholder-transparent focus:ring-0">
                    <button type="submit"
                        class="flex items-center justify-center w-full p-2 m-1 text-white transition-colors duration-200 transform rounded-md lg:w-12 lg:h-12 lg:p-0 bg-blue-400 hover:bg-blue-300 focus:outline-none focus:bg-blue-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <div data-aos="fade-up-left" data-aos-duration="6000" class="w-full mt-4 lg:mt-0 lg:w-1/2"><img
                src="{{ asset('dist/images/illustration.svg') }}" alt="web designer"
                class="w-full h-full max-w-md mx-auto"></div>
    </section>

<script>
const picker = document.getElementById('tanggal_kunjungan');
picker.addEventListener('input', function(e){
  var day = new Date(this.value).getUTCDay();
  if([6,0].includes(day)){
    e.preventDefault();
    this.value = '';
    alert('Mohon Maaf Hari Kunjungan Museum Hanya Hari Kerja');
  }
});
</script>
@endsection