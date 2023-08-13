@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Composer un nouveau message</h1>
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="receiver_name" class="form-label">Nom du destinataire :</label>
            <input type="text" name="receiver_name" id="receiver_name" class="form-control" required value="{{ old('receiver_name') }}" @if(old('send_to_all')) disabled @endif>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="send_to_all" id="send_to_all" class="form-check-input" onchange="toggleReceiverNameInput()">
            <label class="form-check-label" for="send_to_all">Envoyer à tout le monde :</label>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message :</label>
            <textarea name="message" id="message" class="form-control" required>{{ old('message') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

<!-- JavaScript pour désactiver le champ "receiver_name" lorsque la case "send_to_all" est cochée -->
<script>
    function toggleReceiverNameInput() {
        const receiverNameInput = document.getElementById('receiver_name');
        const sendToAllCheckbox = document.getElementById('send_to_all');

        // Désactiver le champ "receiver_name" si la case "send_to_all" est cochée
        receiverNameInput.disabled = sendToAllCheckbox.checked;
    }
</script>
@endsection
