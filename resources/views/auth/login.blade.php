@extends('layouts.appMaster')
@section('title', 'Login')
@section('content')
    <section class="clean-block clean-form dark">
        <div class="container fw-light">
            <div class="block-heading">
                <h2 style="color: #087f5b";>Library Account Login</h2>
            </div>
            <form action="validate" method="POST">
                @csrf
                <div class="mb-3"><label class="form-label" for="email">Email Address</label><input class="form-control item" type="email" name="email" maxlength="30" required="" minlength="1"></div>
                <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control item" type="password" name="password" required="" minlength="6" maxlength="15" autocomplete="off"></div>
                <button class="btn btn-primary abutton" style="background-color: #087f5b" type="submit">Login</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-primary abutton" style="background-color: #087f5b" role="button" href="/index" >Cancel</a>
            </form>
        </div>
    </section>
@endsection
