<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    @if (session('info'))
    <div class="alert alert-primary alert-dismissible show flex items-center mb-2" role="alert">
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> {{ session('info') }} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <i data-feather="x" class="w-4 h-4"></i>
        </button>
    </div>
    @endif
    @if (session('info2'))
    <div class="alert alert-secondary alert-dismissible show flex items-center mb-2" role="alert">
        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ session('info2') }} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <i data-feather="x" class="w-4 h-4"></i>
        </button>
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert">
        <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {{ session('success') }} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <i data-feather="x" class="w-4 h-4"></i>
        </button>
    </div>
    @endif
    @if (session('warning'))
    <div class="alert alert-warning alert-dismissible show flex items-center mb-2" role="alert">
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> {{ session('warning') }} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <i data-feather="x" class="w-4 h-4"></i>
        </button>
    </div>
    @endif
    @if (session('danger'))
    <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ session('danger') }} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <i data-feather="x" class="w-4 h-4"></i>
        </button>
    </div>
    @endif
    @if (session('info3'))
    <div class="alert alert-dark alert-dismissible show flex items-center mb-2" role="alert">
        <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {{ session('info3') }} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <i data-feather="x" class="w-4 h-4"></i>
        </button>
    </div>
    @endif
</div>