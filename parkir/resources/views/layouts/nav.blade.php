@if (auth()->user()->level == 'admin')
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'parkir');
    ?>
    @foreach ($namaPegawai as $name)
        <div class="px-3 mt-3 mb-3">
            <a href="/reportadmin" style="text-decoration: none;">
                <button class="btn btn-light border border-primary bg-none">
                    <i class="fa-solid fa-book fa-xl text-primary"></i>
                </button>
            </a>            
            <a href="/logout">
                <button class="btn btn-light border-danger float-end"><i
                        class="fa-solid fa-right-from-bracket text-danger"></i></button>
            </a>
        </div>
        <strong class="text-center"><u>{{ $name }}</u></strong>
    @endforeach
@else
    <div class="px-3 mt-3 mb-3">
        <a href="report" style="text-decoration: none;">
            <button class="btn btn-light border border-primary bg-none">
                <i class="fa-solid fa-book fa-xl text-primary"></i>
            </button>
        </a>
        <a href="profile" style="text-decoration: none;">
            <button class="btn btn-light border border-primary bg-none">
                <i class="fa-solid fa-user fa-xl text-primary"></i>
            </button>
        </a>
        <a href="checkin" style="text-decoration: none;">
            <button class="btn btn-light border border-primary bg-none text-primary">
                Checkin
            </button>
        </a>
        <a href="checkout" style="text-decoration: none;">
            <button class="btn btn-light border border-primary bg-none text-primary">
                Checkout
            </button>
        </a>
        <a href="logout">
            <button class="btn btn-light border-danger float-end"><i
                    class="fa-solid fa-right-from-bracket text-danger"></i></button>
        </a>
    </div>
    <strong class="text-center"><u>{{ auth()->user()->pegawai->nama }}</u></strong>
@endif
