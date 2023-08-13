@extends('layouts.guest')

@section('content')
    <div class="container mt-5">
        <div class="mb-4 text-sm text-gray-600">
            {{ __("Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer par e-mail ? Si vous n'avez pas reçu l'e-mail, nous vous en enverrons volontiers un autre.") }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-success">
                {{ __("Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de l'inscription.") }}
            </div>
        @endif

        <div class="mt-4 d-flex align-items-center justify-content-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <button type="submit" class="btn btn-primary">
                        {{ __("Renvoyer l'e-mail de vérification") }}
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link">
                    {{ __("Se déconnecter") }}
                </button>
            </form>
        </div>
    </div>
@endsection
