@extends('../layoutfront/app')

@section('content')

    <section class="mx-auto w-full lg:items-center lg:mt-20">
        <div class="container mx-auto pt-10 lg:pt-0">
            <div class="justify-center">
                <h1 data-aos="fade-down" data-aos-delay="500" class="font-extrabold text-gray-700 text-center text-4xl">Cara Booking Kunjungan Museum Blambangan</h1>
                <p data-aos="fade-up" data-aos-delay="600" class="font-base text-gray-500 text-center text-xl my-4">Anda bisa melakukan Booking kunjungan secara online, <br> Pastikan anda sudah tau caranya, jika belum bisa ikuti langkah-langkah berikut !</p>
            </div>
        </div>
    </section>
    <section class="mx-auto w-full lg:items-center mb-5 lg:mb-20">
        <div class="container mx-auto pt-10 lg:pt-0">
            <div class="justify-start">
                <ol class="list-decimal font-base text-gray-500 text-xl">
                    @foreach ($caras as $item)
                    <li data-aos="fade-right" data-aos-delay="300">{{ $item->keterangan }}</li>
                    <div data-aos="fade-right" data-aos-delay="400" class="my-2 mx-2">
                    <img class="object-fill lg:max-h-screen w-full" src="{{ $item->foto }}" alt="">
                    </div>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>

@endsection