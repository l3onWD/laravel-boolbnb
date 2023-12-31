<!--Layout app-->
@extends('layouts.app')

<!--Sezione del main-->
@section('main')
    <!--Contenitore-->
    <div class="container my-5" id="get-validation" data-validate="register">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 rounded shadow p-2">
                    <!--Intestazione-->
                    <div class="card-header bg-white border-0 h3">{{ __('Registrati') }}</div>

                    <div class="card-body">
                        <form id="validation-form" method="POST" action="{{ route('register') }}" novalidate>
                            @csrf

                            <!--Nome-->
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="name-error" class="text-danger"></span>
                                </div>

                            </div>

                            <!--Cognome-->
                            <div class="mb-4 row">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="surname-error" class="text-danger"></span>
                                </div>
                            </div>


                            <!--Data-->
                            <div class="mb-4 row">
                                <label for="date_of_birth"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Data di nascita') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" type="date"
                                        class="form-control @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" value="{{ old('date_of_birth') }}" required
                                        autocomplete="date_of_birth" autofocus>

                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="date-error" class="text-danger"></span>
                                </div>
                            </div>

                            <!--Email-->
                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Email') }}
                                    <span class="form-text text-danger fs-5">*</span>
                                </label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="email-error" class="text-danger"></span>
                                </div>
                            </div>

                            <!--Password-->
                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Password') }}
                                    <span class="form-text text-danger fs-5">*</span>
                                </label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="password-error" class="text-danger"></span>
                                </div>
                            </div>
                  
                        <!--Conferma Password-->
                        <div class="mb-4 row">
                            <label for="passwordConfirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                           
                                <div class="col-md-6">
                                    <input id="passwordConfirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">

                                    @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span id="passwordConfirm-error" class="text-danger"></span>
                                </div>

                            </div>

                            <!--Bottone Registrati-->
                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!--Sezione scripts-->
@section('scripts')
@vite(['resources/js/frontend-validation.js'])
@endsection

