@extends('../layout/' . $layout)

@section('subhead')
    <title>Sistem - Booking - Kunjungan Museum Blambangan</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Riwayat Booking Kunjungan Museum Blambangan</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2">Add New Product</button>
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
            <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
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
                        <th class="text-center whitespace-nowrap">Dokumen</th>
                        <th class="text-center whitespace-nowrap">STATUS Booking</th>
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
                            <td>
                                @empty($item->doc_persyaratan->doc)
                                    <a href="#">Tidak Ada Dokumen</a>
                                @endempty

                                @if (!empty($item->doc_persyaratan->doc))
                                    <a href="{{ asset('storage/'.$item->doc_persyaratan->doc) }}" target="_blank">Lihat Dokumen</a>

                                @endif
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
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-gray-600 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
@endsection