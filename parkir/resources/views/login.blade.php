@extends('layouts.main')
<link rel="stylesheet" href={{ asset('style.css') }}>
@section('content')
    <div class="blok" style="width:350px">
        <!-- partial:index.partial.html -->
        <section class="forms-section">
            <h1 class="section-title">Parking System</h1>
            <div class="forms">
                <div class="form-wrapper is-active">
                    <button type="button" class="switcher switcher-login">
                        Login
                        <span class="underline"></span>
                    </button>
                    <form class="form form-login" action="/login" method="post">
                        @csrf
                        <fieldset>
                            <legend>Please, enter your email and password for login.</legend>
                            <div class="input-block">
                                <label for="login-email">Email</label>
                                <input id="login-email" type="email" name="email" class="@error('email') is-invalid @enderror" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-block">
                                <label for="login-password">Password</label>
                                <input id="login-password" type="password" name="password" class="@error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </fieldset>
                        <button type="submit" class="btn-login bg-primary">Login</button>
                    </form>
                </div>
                <div class="form-wrapper">
                    <button type="button" class="switcher switcher-signup">
                        Sign Up
                        <span class="underline"></span>
                    </button>
                    <form class="form form-signup">
                        <fieldset>
                            <legend>Please, enter your email, password and password confirmation for sign up.</legend>
                            <div class="input-block">
                                <label for="signup-nama">Nama Lengkap</label>
                                <input id="signup-nama" type="nama" required>
                            </div>
                            <div class="input-block">
                                <label for="signup-idPegawai">ID Pegawai</label>
                                <input id="signup-idPegawai" type="idPegawai" required>
                            </div>
                            <div class="input-block">
                                <label for="signup-email">Email</label>
                                <input id="signup-email" type="email" required>
                            </div>
                            <div class="input-block">
                                <label for="signup-password">Password</label>
                                <input id="signup-password" type="password" required>
                            </div>
                            <div class="input-block">
                                <label for="signup-password-confirm">Confirm password</label>
                                <input id="signup-password-confirm" type="password" required>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn-signup bg-primary">Continue</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- partial -->
    </div>
    <script>
        const switchers = [...document.querySelectorAll('.switcher')]

        switchers.forEach(item => {
            item.addEventListener('click', function() {
                switchers.forEach(item => item.parentElement.classList.remove('is-active'))
                this.parentElement.classList.add('is-active')
            })
        })
    </script>
@endsection
