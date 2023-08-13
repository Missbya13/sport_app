@extends('layouts.guest')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Adresse e-mail -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Adresse e-mail') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                @if ($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- Mot de passe -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                @if ($errors->has('password'))
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <!-- Confirmer le mot de passe -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary">{{ __('Réinitialiser le mot de passe') }}</button>
            </div>
        </form>
    </div>
@endsection
