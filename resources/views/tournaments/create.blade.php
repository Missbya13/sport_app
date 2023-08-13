@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Créer un nouveau tournoi</h1>

    <form action="{{ route('tournaments.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nameTournament" class="form-label">Nom :</label>
            <input type="text" name="nameTournament" id="nameTournament" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Sport :</label>
            <select name="type" id="type" class="form-control" required>
                <option value="basket">Basket</option>
                <option value="football">Football</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="type_tournoi" class="form-label">Type de tournoi :</label>
            <select name="type_tournoi" id="type_tournoi" class="form-control" required>
                <option value="interclasse">Interclasse</option>
                <option value="national">National</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Date de début :</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Date de fin :</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

    <a href="{{ route('tournaments.index') }}" class="btn btn-secondary mt-3">Retour à la liste des tournois</a>
</div>
@endsection
