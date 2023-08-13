@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un match de basket</h1>

    <form action="{{ route('matches_basketball.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="teamA_id" class="form-label">Équipe A :</label>
            <select name="teamA_id" id="teamA_id" class="form-select" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="teamB_id" class="form-label">Équipe B :</label>
            <select name="teamB_id" id="teamB_id" class="form-select" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tournament_id" class="form-label">Tournoi :</label>
            <select name="tournament_id" id="tournament_id" class="form-select" required>
                @foreach($tournaments as $tournament)
                    <option value="{{ $tournament->id }}">{{ $tournament->nameTournament }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="dateOfMatch" class="form-label">Date du match :</label>
            <input type="date" name="dateOfMatch" id="dateOfMatch" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer le match</button>
    </form>

    <a href="{{ route('tournaments.index') }}" class="btn btn-secondary mt-3">Retour à la liste des tournois</a>
</div>
@endsection
