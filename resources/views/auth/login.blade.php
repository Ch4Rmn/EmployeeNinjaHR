@extends('layouts.app_plain')
@section('title', 'Login')
@section('customCss')
    <style>
        /* .apple {
                        background-color: rgb(19, 19, 96)
                    } */
    </style>
@section('content')
    <div class="container">

        <div class="row justify-content-center align-content-center vh-100">

            <div class="col-md-6">
                <div class="text-center vh-25 mb-3">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 130px">
                </div>
                <div class="card">

                    <div class="mx-3">
                        <h1 class="mt-2">Login</h1>
                        <p>Please fill your account</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!--  -->
                            <form>
                                <!-- Email input -->
                                {{-- <div data-mdb-input-init class="form-outline mb-4">
                                    <!-- <input type="email" id="form1Example1" class="form-control" /> -->
                                    <input id="email" type="email" id="form1Example1"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="form-label" for="form1Example1">Email address</label>
                                </div> --}}

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <!-- <input type="email" id="form1Example1" class="form-control" /> -->
                                    <input id="phone" type="phone" id="form1Example1"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="form-label" for="form1Example1">Phone</label>
                                </div>

                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input id="password" type="password" id="form1Example2"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="form-label" for="form1Example2">Password</label>
                                </div>

                                <!-- 2 column grid layout for inline styling -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <div class="md-form mt-3">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                    </div>
                </div>


            </div>

            <!-- Submit button -->
            </form>


        </div>
    </div>

@section('javascript')
@endsection
