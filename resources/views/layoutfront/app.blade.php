<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="{{ asset('dist/images/logo2.png') }}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum Blambangan</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        section.s1 {
            background-color: white;
            width: 100%;
        }

        section.s2 {
            background: #FDFFD9;
            width: 100%
        }

        section.s3 {
            background: #FFCC98;
            width: 100%;
        }
        footer.footer {
        position: relative;
        left: 0;
        bottom: 0;
        width: 100%;
        background: #F5CA7B;
        }
    </style>
</head>

<body>
    <div x-data="{ isOpen: false }" class="flex sticky top-0 justify-between bg-gray-50 border-2 lg:p-6 lg:px-32 z-10">
        <div class="flex items-center px-2 lg:px-10">
            <img class="w-10" src="{{ asset('dist/images/logo2.png') }}"
                alt="Museum Blambangan By Misbahur Rifqi">
            <h3 class="invisible text-2xl font-bold text-gray-600 px-2 lg:visible uppercase">Museum Blambangan</h3>
        </div>

        <!-- left header section -->
        <div class="flex items-center justify-between px-2 lg:px-16">
            <button @click="isOpen = !isOpen" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 lg:hidden" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="hidden space-x-8 lg:inline-block">
                <a href="{{ route('booking','#beranda') }}"
                    class="text-base font-semibold text-gray-600 ">Beranda</a>
                <a href="{{ route('booking','#tentang') }}"
                    class="text-base font-semibold text-gray-600 ">Tentang</a>
                <a href="{{ route('booking','#digitalisasi') }}"
                    class="text-base font-semibold text-gray-600 ">Digitalisasi</a>
                <a href="{{ route('booking','#informasi') }}"
                    class="text-base font-semibold text-gray-600 ">Informasi</a>
                <a href="{{ route('carabook') }}" class="text-base font-semibold text-gray-600 ">Cara
                    Booking</a>
                <a href="{{ route('cekkode') }}"
                    class="bg-green-600 px-2 py-2 text-base font-extrabold text-white rounded-lg">Cek Kode Booking</a>
            </div>

            <!-- mobile navbar -->
            <div class="mobile-navbar">
                <!-- navbar wrapper -->
                <div class="fixed left-0 w-full h-48 p-5 bg-white rounded-lg shadow-xl top-16" x-show="isOpen" <blade
                    click|.away%3D%26%2334%3B%20isOpen%20%3D%20false%26%2334%3B%3E>
                    <div class="flex flex-col space-y-6">
                        <a href="{{ route('booking','#beranda') }}"
                            class="text-sm text-black">Beranda</a>
                        <a href="{{ route('booking','#tentang') }}"
                            class="text-sm text-black">Tentang</a>
                        <a href="{{ route('booking','#digitalisasi') }}"
                            class="text-sm text-black">Digitalisasi</a>
                        <a href="{{ route('booking','#informasi') }}"
                            class="text-sm text-black">Informasi</a>
                        <a href="{{ route('carabook') }}"
                            class="text-sm text-black">Cara Booking</a>
                        <a href="{{ route('cekkode') }}"
                            class="bg-green-600 px-2 py-2 text-sm font-extrabold text-white rounded-lg">Cek Kode
                            Booking</a>
                    </div>
                </div>
            </div>
            <!-- end mobile navbar -->
        </div>
        <!-- right header section -->
    </div>
    <!-- header/navigation -->

    @yield('content')

    <!-- Footer -->
    <footer class="footer relative pt-1 border-b-2 border-blue-700">
        <div class="max-w-7xl container mx-auto px-6">
            <div class="sm:flex sm:mt-8">
                <div class="mt-8 sm:mt-0 sm:w-full sm:px-8 flex flex-col lg:flex-row justify-between">
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-500 uppercase mb-2">Main Menu</span>
                        <div class="grid grid-flow-col grid-cols-2 grid-rows-3 gap-2">
                        <span class="my-2"><a href="{{ route('booking','#beranda') }}"
                                class="text-base font-semibold text-gray-600  text-md hover:text-blue-500">Beranda</a></span>
                        <span class="my-2"><a href="{{ route('carabook') }}"
                                class="text-base font-semibold text-gray-600  text-md hover:text-blue-500">Cara Booking</a></span>
                        <span class="my-2"><a href="{{ route('cekkode') }}"
                                class="text-base font-semibold text-gray-600  text-md hover:text-blue-500">Cek Kode Booking</a></span>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-500 uppercase mt-4 lg:mt-0 mb-2">Link Direktory</span>
                        <div class="grid grid-flow-col grid-cols-2 grid-rows-3 gap-2">
                        @foreach ($links as $item)
                            <span class="my-2"><a href="{{ $item->link }}"
                                class="text-base font-semibold text-gray-600 text-md hover:text-blue-500">{{ $item->title }}
                            </a></span>
                        @endforeach
                        {{-- <span class="my-2"><a href="http://disbudpar.banyuwangikab.go.id/"
                                class="text-base font-semibold text-gray-600  text-md hover:text-blue-500">Dinas
                                Kebudayan dan Pariwisata Banyuwangi
                            </a></span>
                        <span class="my-2"><a href="http://dkb.or.id/"
                                class="text-base font-semibold text-gray-600 text-md hover:text-blue-500">Dewan Kesenian
                                Blambangan
                            </a></span> --}}
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-500 uppercase mt-4 lg:mt-0 mb-2">Contact & Social Media</span>
                        <div class="grid grid-flow-col grid-cols-2 grid-rows-3 gap-2">
                        @foreach ($socials as $item)
                            <span class="flex my-2"><img class="h-6 w-6 mr-2"
                                src="{{ asset('storage/'.$item->logo) }}" alt="Whatsapp"><a
                                href="{{ $item->link }}"
                                class="text-base font-semibold text-gray-600  text-md hover:text-blue-500">{{ $item->title }}</a></span>
                        @endforeach
                        
                        {{-- <span class="flex my-2"><img class="h-6 w-6 mr-2"
                                src="{{ asset('dist/images/instagram.png') }}" alt="Instagram"><a
                                href="https://www.instagram.com/museumblambangan/"
                                class="text-base font-semibold text-gray-600  text-md hover:text-blue-500">Museumblambangan</a></span>
                        <span class="flex my-2"><img class="h-6 w-6 mr-2"
                                src="{{ asset('dist/images/youtube.png') }}" alt="wa"><a
                                href="https://www.youtube.com/channel/UCnt6a7DdzfngUwdSR8AhaNg"
                                class="text-base font-semibold text-gray-600  text-md hover:text-blue-500">Banyuwangi
                                Tourism</a></span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-6">
            <div class="mt-16 border-t-2 border-gray-300 flex flex-col items-center">
                <div class="sm:w-2/3 text-center py-6">
                    <p class="text-sm text-gray-500 font-bold italic mb-2">
                        © 2021 by IT Disbudpar Banyuwangi
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    function check() {
        var dropdown = document.getElementById("Categorychoice");
        var current_id = dropdown.options[dropdown.selectedIndex].id;
        console.log(current_id);

        if (current_id == "ya") {

            document.getElementById("doc").style.display = "block";
        } else {
            document.getElementById("doc").style.display = "none";

        }
    }

</script>
<script>
    AOS.init();

</script>

</html>
