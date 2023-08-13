@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le message</h1>
        <form action="{{ route('update.message', ['id' => $message->id_message]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="message" class="form-label">Message :</label>
                <textarea class="form-control" name="message" required>{{ $message->message }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
