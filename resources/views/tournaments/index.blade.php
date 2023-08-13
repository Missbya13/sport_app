@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <div class="container">
        <h1 class="text-center">Liste des tournois</h1>

        @if (count($tournaments) > 0)
            <ul class="list-group tournament-list">
                @foreach ($tournaments as $tournament)
                    <li class="list-group-item tournament-item">
                        <span class="tournament-name">{{ $tournament->nameTournament }}</span>
                        <a href="{{ route('matches.football.create', $tournament->id) }}" class="btn btn-primary">Planifier des matchs de foot</a>
                        <a href="{{ route('matches.basketball.create', $tournament->id) }}" class="btn btn-primary">Planifier des matchs de basket</a>
                        <a href="{{ route('tournaments.show', $tournament->id) }}" class="btn btn-primary">Détails</a>
                        <a href="{{ route('tournaments.edit', $tournament->id) }}" class="btn btn-secondary">Modifier</a>
                        <form action="{{ route('tournaments.destroy', $tournament->id) }}" method="post" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce tournoi ?')">Supprimer</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="no-tournaments">Aucun tournoi disponible.</p>
        @endif

        <a href="{{ route('tournaments.create') }}" class="btn btn-success create-tournament">Créer un nouveau tournoi</a>
    </div>
@endsection
