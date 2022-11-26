    {{-- Alert --}}
    @if ($message = session()->has('gagal'))
        <div class="alert alert-danger text-center alert-dismissible fade show" role="alert"
            style="position:fixed;top:0;width:100%;">
            <strong>Maaf !</strong> {{ session()->get('gagal') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($message = session()->has('sukses'))
        <div class="alert alert-success text-center alert-dismissible fade show" role="alert"
            style="position:fixed;top:0;width:100%;">
            <strong>Selamat !</strong> {{ session()->get('sukses') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- END ALERT --}}