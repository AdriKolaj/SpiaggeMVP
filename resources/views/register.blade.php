@extends('layouts.auth')

@section ('content')
    <div class="row justify-content-center">
        <div class="col-sm-4 mt-5">
            <h1 class="page-title text-center pb-4">REGISTRATI</h1>
            <form method="POST" action="{{ route('register.store') }}" autocomplete="off">
                @csrf

                <div class="group pb-3">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="" required autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="group pb-3">
                    <label for="name">Nome</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="group pb-3">
                    <label for="surname">Cognome</label>
                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="" required autofocus>

                    @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="group pb-3">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autofocus>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="group mb-0 mt-3">
                    <div class="d-flex flex-column">
                        <button type="submit" class="btn btn-dark login-btn">Conferma</button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link forgot-password" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
