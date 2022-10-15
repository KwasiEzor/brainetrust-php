@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row mb-4">
            <h2 class="page__title text-center ">
                <a href="{{ route('login') }}" class="page-title ">
                    Se connecter
                </a>
            </h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 px-3 py-5">

                    <div class="card-body">
                        <form class=" d-flex flex-column gap-4 " method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group ">
                                <label for="email" class="form-label fs-5 text-primary">
                                    <i class="bi bi-envelope-fill"></i>
                                    {{ __('Email') }} :
                                </label>


                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group ">
                                <label for="password" class="form-label  fs-5 text-primary">
                                    <i class="bi bi-lock-fill"></i>
                                    {{ __('Mot de passe') }} :
                                </label>

                                
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               
                            </div>

                            <div class="form-group">

                                
                                    <input class="form-check-input " type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-primary" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                

                            </div>

                            <div class="form-group d-grid">

                                <button type="submit" class="btn btn-primary fs-5">
                                    {{ __('Je me connecte') }}
                                    <i class="bi bi-send-fill"></i>
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
