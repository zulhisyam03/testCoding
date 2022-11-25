@extends('layouts.main')
@section('content')
    <div class="blok" style="width:350px">
        <div class="card">
            <div class="card-title mt-3">
                <h2 align="center">LOGIN</h2>
            </div>
            <form action="/login" method="post">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm">
                            <input type="text" name="username" id="" class="form-control" required
                                placeholder="Username">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <input type="password" name="password" id="" class="form-control" required
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm">
                            <input type="submit" value="Login" class="btn btn-success float-start">
                            <a href="register" class="float-end">Create Account !!</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
