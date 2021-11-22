@extends('../layout/' . $layout)

@section('subhead')
    <title>Sistem - Booking - Kunjungan Museum Blambangan</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Setting App</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">App Name</label>
                    <input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text">
                </div>
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Url</label>
                    <input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text">
                </div>
                <div class="mt-3">
                    <label for="crud-form-1" class="form-label">Copyright</label>
                    <input id="crud-form-1" type="text" class="form-control w-full" placeholder="Input text">
                </div>
                <div class="text-right mt-5">
                    <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" class="btn btn-primary w-24">Save</button>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>    
@endsection