@extends('../layout/' . $layout)

@section('subhead')
    <title>Sistem - Booking - Kunjungan Museum Blambangan</title>
@endsection

@section('subcontent')
   <h2 class="intro-y text-lg font-medium mt-10">Link Directory Museum</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <!-- BEGIN: Notification Content -->
            <div id="basic-non-sticky-notification-content" class="toastify-content hidden flex flex-col sm:flex-row">
                <div class="font-medium">Form untuk Tambah Data nya di bawah ini</div>
                <a class="font-medium text-theme-1 dark:text-gray-500 mt-1 sm:mt-0 sm:ml-40" href="">:)</a>
            </div>
            <!-- END: Notification Content -->
            <button id="basic-non-sticky-notification-toggle" class="btn btn-primary shadow-md mr-2">Add New Product</button>
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
        <div class="intro-y col-span-6 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">Nama Directory</th>
                        <th class="text-center whitespace-nowrap">Title</th>
                        <th class="text-center whitespace-nowrap">Link</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($links as $item)
                        <tr class="intro-x">
                            <td>
                                <div class="font-medium whitespace-nowrap">{{ $item->nama }}</div>
                            </td>
                            <td>
                                <div class="whitespace-nowrap">{{ $item->title }}</div>
                            </td>
                            <td>
                                <div class="whitespace-nowrap">{{ $item->link }}</div>
                            </td>
                            <td class="table-report__action w-56">
                                <form action="{{ route('linkdel', $item->id) }}" method="post">
                                @csrf
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('linkedit', $item->id) }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <button type="submit" class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
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
        <div class="intro-y col-span-6 overflow-auto lg:overflow-visible">
            <h2 class="text-lg font-medium mr-auto">Form Layout</h2>
            <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    <form method="POST" action="{{ route('linkupdate', $link->id) }}">
                    @csrf
                    <div>
                        <label for="crud-form-1" class="form-label">Nama</label>
                        <input id="crud-form-1" name="nama" value="{{ $link->nama }}" type="text" class="form-control w-full" placeholder="Input nama link">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-3" class="form-label">Title Link Directory</label>
                        <input id="crud-form-3" name="title" value="{{ $link->title }}" type="text" class="form-control w-full" placeholder="Input Title link">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-4" class="form-label">Link Link Directory</label>
                        <input id="crud-form-4" name="link" value="{{ $link->link }}" type="text" class="form-control w-full" placeholder="Input Link link">
                    </div>
                    <div class="text-right mt-5">
                        <button type="button" action="{{ route('datalink') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                    </form>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
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
        <div class="col-span-12 lg:col-span-6">
            @include('components.alert')
        </div>
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