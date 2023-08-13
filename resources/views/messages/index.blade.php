@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style2.css') }}">

<div class="container">
    <h2>Messages reçus</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Message</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($receivedMessages as $message)
            <tr>
                <td>{{ $message->message }}</td>
                <td>{{ $message->statut_message }}</td>
                <td>
                    @if($message->id_user_send === auth()->user()->id || $message->id_user_receive === auth()->user()->id)
                    <form action="{{ route('delete.message', ['id' => $message->id_message]) }}" method="post"
                        class="delete-message-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" name="delete_for" value="me">Supprimer pour
                            moi</button>
                    </form>
                    @endif

                    <form action="{{ route('edit.message', ['id' => $message->id_message]) }}" method="get"
                        class="delete-message-form">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm" name="edit">Éditer</button>
                    </form>

                    <form action="{{ route('delete.message.for.all', ['id' => $message->id_message]) }}"
                        method="post" class="delete-message-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" name="delete_for" value="all">Supprimer pour
                            tout le monde</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Messages envoyés</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Message</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sentMessages as $message)
            <tr>
                <td>{{ $message->message }}</td>
                <td>{{ $message->statut_message }}</td>
                <td>
                    @if($message->id_user_send === auth()->user()->id || $message->id_user_receive === auth()->user()->id)
                    <form action="{{ route('delete.message', ['id' => $message->id_message]) }}" method="post"
                        class="delete-message-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" name="delete_for" value="me">Supprimer pour
                            moi</button>
                    </form>

                    <form action="{{ route('delete.message.for.all', ['id' => $message->id_message]) }}"
                        method="post" class="delete-message-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" name="delete_for" value="all">Supprimer pour
                            tout le monde</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Messages envoyés à tout le monde</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Message</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sentToAllMessages as $message)
            <tr>
                <td>{{ $message->message }}</td>
                <td>{{ $message->statut_message }}</td>
                <td>
                    @if($message->id_user_send === auth()->user()->id || $message->id_user_receive === auth()->user()->id)
                    <form action="{{ route('delete.message', ['id' => $message->id_message]) }}" method="post"
                        class="delete-message-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" name="delete_for" value="me">Supprimer pour
                            moi</button>
                    </form>

                    <form action="{{ route('delete.message.for.all', ['id' => $message->id_message]) }}"
                        method="post" class="delete-message-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" name="delete_for" value="all">Supprimer pour
                            tout le monde</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
