@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le tournoi</h1>

        <form action="{{ route('tournaments.update', $tournament->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nameTournament" class="form-label">Nom :</label>
                <input type="text" name="nameTournament" id="nameTournament" value="{{ $tournament->nameTournament }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Sport :</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="basket" {{ $tournament->type === 'basket' ? 'selected' : '' }}>Basket</option>
                    <option value="football" {{ $tournament->type === 'football' ? 'selected' : '' }}>Football</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="type_tournoi" class="form-label">Type de tournoi :</label>
                <select name="type_tournoi" id="type_tournoi" class="form-control" required>
                    <option value="interclasse" {{ $tournament->type_tournoi === 'interclasse' ? 'selected' : '' }}>Interclasse</option>
                    <option value="national" {{ $tournament->type_tournoi === 'national' ? 'selected' : '' }}>National</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" id="description" class="form-control">{{ $tournament->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Date de début :</label>
                <input type="date" name="start_date" id="start_date" value="{{ $tournament->start_date }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">Date de fin :</label>
                <input type="date" name="end_date" id="end_date" value="{{ $tournament->end_date }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>

        <a href="{{ route('tournaments.show', $tournament->id) }}" class="btn btn-link">Annuler</a>
    </div>
@endsection
