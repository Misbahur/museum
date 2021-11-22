@extends('../layout/' . $layout)

@section('subhead')
    <title>Sistem - Booking - Kunjungan Museum Blambangan</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Data Kouta Kunjungan</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="text-center">
                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="btn btn-primary">Tambah Kouta</a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 w-3/4 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">Kouta</th>
                        <th class="whitespace-nowrap">Sesi</th>
                        <th class="text-center whitespace-nowrap">STOCK</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="intro-x">
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ 'Kouta Harian' }}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ '12 November 2021' }}</div>
                        </td>
                        <td class="text-center">{{ 'Pagi' }}</td>
                        <td class="text-center">{{ '50' }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                     <tr class="intro-x">
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ 'Kouta Harian' }}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ '12 November 2021' }}</div>
                        </td>
                        <td class="text-center">{{ 'Siang' }}</td>
                        <td class="text-center">{{ '50' }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                     <tr class="intro-x">
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ 'Kouta Harian' }}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ '12 November 2021' }}</div>
                        </td>
                        <td class="text-center">{{ 'Sore' }}</td>
                        <td class="text-center">{{ '50' }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr class="intro-x">
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ 'Kouta Harian' }}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ '13 November 2021' }}</div>
                        </td>
                        <td class="text-center">{{ 'Pagi' }}</td>
                        <td class="text-center">{{ '50' }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                     <tr class="intro-x">
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ 'Kouta Harian' }}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ '13 November 2021' }}</div>
                        </td>
                        <td class="text-center">{{ 'Siang' }}</td>
                        <td class="text-center">{{ '50' }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                     <tr class="intro-x">
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ 'Kouta Harian' }}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ '13 November 2021' }}</div>
                        </td>
                        <td class="text-center">{{ 'Sore' }}</td>
                        <td class="text-center">{{ '50' }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr class="intro-x">
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ 'Kouta Harian' }}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ '14 November 2021' }}</div>
                        </td>
                        <td class="text-center">{{ 'Pagi' }}</td>
                        <td class="text-center">{{ '50' }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                     <tr class="intro-x">
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ 'Kouta Harian' }}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ '14 November 2021' }}</div>
                        </td>
                        <td class="text-center">{{ 'Siang' }}</td>
                        <td class="text-center">{{ '50' }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                     <tr class="intro-x">
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ 'Kouta Harian' }}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ '14 November 2021' }}</div>
                        </td>
                        <td class="text-center">{{ 'Sore' }}</td>
                        <td class="text-center">{{ '50' }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            
        </div>
        <!-- END: Pagination -->
    </div>
        <!-- BEGIN: Modal Content -->
        <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Tambah Kouta</h2>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-1" class="form-label">Tanggal Awal</label>
                            <input name="tanggal_awal" class="datepicker form-control block mx-auto" data-single-mode="true">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="modal-form-2" class="form-label">Tanggal Akhir</label>
                            <input name="tanggal_awal" class="datepicker form-control block mx-auto" data-single-mode="true">
                        </div>
                        <div class="col-span-12 sm:col-span-6 w-full">
                            <label for="modal-form-3" class="form-label">Sesi</label>
                            <select name="sesi" class="form-select form-select-md sm:mt-2 sm:mr-2" aria-label=".form-select-lg example">
                                <option selected disabled>-- Pilih Sesi --</option>
                                @foreach ($sesis as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="button" class="btn btn-primary w-20">Send</button>
                    </div>
                    <!-- END: Modal Footer -->
                </div>
            </div>
        </div>
        <!-- END: Modal Content -->
@endsection