@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-10 mx-auto">
            <h2 class="page-title">Page d'inscription</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 px-lg-4 px-md-3 py-3">


                <div class="card-body">
                    <form class="d-flex flex-column gap-4" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group" >
                            <label for="name" class="form-label fs-5 text-primary">
                                <i class="bi bi-person-fill"></i>
                                {{ __('Nom et prénoms') }} 
                            </label>


                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class=" form-group">
                            <label for="email" class="form-label fs-5 text-primary">
                                <i class="bi bi-envelope-fill"></i>
                                {{ __('Email') }} 
                            </label>


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="password" class="form-label fs-5 text-primary">
                                <i class="bi bi-lock-fill"></i>
                                {{ __('Mot de passe') }} 
                            </label>


                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="form-label fs-5 text-primary">
                                <i class="bi bi-lock-fill"></i>
                                {{ __('Confirmer mot de passe') }} 
                            </label>


                            <input id="password-confirm" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group d-grid" >
                            <button type="submit" class="btn btn-primary fs-5">
                                {{ __('Je m\'inscris') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection