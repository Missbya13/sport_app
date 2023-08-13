<!-- resources/views/tournaments/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails du tournoi</h1>

        <p>Nom : {{ $tournament->nameTournament }}</p>
        <p>Description : {{ $tournament->description }}</p>
        <p>Sport : {{ $tournament->type }}</p>
        <p>Type de tournoi : {{ $tournament->type_tournoi }}</p>
        <p>Date de début : {{ $tournament->start_date }}</p>
        <p>Date de fin : {{ $tournament->end_date }}</p>

        <a href="{{ route('tournaments.edit', $tournament->id) }}" class="btn btn-primary">Modifier</a>

        <form action="{{ route('tournaments.destroy', $tournament->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce tournoi ?')">Supprimer</button>
        </form>

        <a href="{{ route('tournaments.index') }}" class="btn btn-secondary">Retour à la liste des tournois</a>
    </div>
@endsection
