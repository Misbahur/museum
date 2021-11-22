@extends('../layout/' . $layout)

@section('subhead')
    <title>Sistem - Booking - Kunjungan Museum Blambangan</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Daftar Booking Museum</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 mr-2">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 mx-2">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input class="datepicker form-control w-56 block mx-auto" data-single-mode="true">
                </div>
            </div>
            <button class="btn btn-primary shadow-md ">Cari Data</button>
            <div class="hidden md:block mx-auto text-gray-600"></div>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
             <div class="col-span-12 lg:col-span-6">
            @include('components.alert')
             </div>
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">Nama</th>
                        <th class="whitespace-nowrap">Email</th>
                        <th class="text-center whitespace-nowrap">Tanggal Kunjungan</th>
                        <th class="text-center whitespace-nowrap">Kategori Pengunjung</th>
                        <th class="text-center whitespace-nowrap">Sesi Kunjungan</th>
                        <th class="text-center whitespace-nowrap">Jumlah Pengunjung</th>
                        <th class="text-center whitespace-nowrap">Kode Booking</th>
                        <th class="text-center whitespace-nowrap">STATUS Booking</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $item)
                        <tr class="intro-x">
                            <td>
                                <div class="font-medium text-gray-700 whitespace-nowrap">{{ $item->pengunjung->nama }}</div>
                            </td>
                            <td>
                                <div class="font-medium text-gray-700 whitespace-nowrap">{{ $item->pengunjung->email }}</div>
                            </td>
                            <td>
                                <div class="font-medium text-gray-700 whitespace-nowrap">{{ $item->tanggal_berkunjung }}</div>
                            </td>
                            <td>
                                <div class="font-medium text-gray-700 whitespace-nowrap">{{ $item->kategori->nama }}</div>
                            </td>
                            <td>
                                <div class="font-medium whitespace-nowrap">{{ $item->sesi->nama }}</div>
                            </td>
                            <td class="text-center">{{ $item->jumlah_pengunjung }}</td>
                            <td>
                                <div class="text-center font-bold whitespace-nowrap">{{ $item->barcode }}</div>
                            </td>
                            <td class="w-40">
                                <div class="flex items-center justify-center">
                                    @if ($item->status == "belum")
                                    <i data-feather="check-square" class="w-4 h-4 mr-2 text-theme-6"></i> <span class="text-theme-6">{{ $item->status}}</span>
                                    @else
                                    <i data-feather="check-square" class="w-4 h-4 mr-2 text-theme-9"></i> <span class="text-theme-9">{{ $item->status}}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <form action="{{ route('bookingdelete',$item->id) }}" method="post" >
                                    @csrf
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('bookingedit', $item->id) }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <button type="submit" class="flex items-center text-theme-6" href="javascript:;">
                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </button>
                                </div>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <ul class="pagination">
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevrons-left"></i>
                    </a>
                </li>
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevron-left"></i>
                    </a>
                </li>
                <li>
                    <a class="pagination__link" href="">...</a>
                </li>
                <li>
                    <a class="pagination__link" href="">1</a>
                </li>
                <li>
                    <a class="pagination__link pagination__link--active" href="">2</a>
                </li>
                <li>
                    <a class="pagination__link" href="">3</a>
                </li>
                <li>
                    <a class="pagination__link" href="">...</a>
                </li>
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevrons-right"></i>
                    </a>
                </li>
            </ul>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection