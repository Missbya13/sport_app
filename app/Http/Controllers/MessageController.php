<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    public function index()
    {
        // Récupérer tous les messages reçus par l'utilisateur connecté (non supprimés)
        $receivedMessages = Message::where('id_user_receive', auth()->user()->id)
            ->where('deleted_by', null)
            ->get();
    
        // Récupérer tous les messages envoyés par l'utilisateur connecté (non supprimés)
        $sentMessages = Message::where('id_user_send', auth()->user()->id)
            ->where('deleted_by', null)
            ->get();
    
        // Récupérer tous les messages envoyés à tout le monde (non supprimés)
        $sentToAllMessages = Message::where('id_user_receive', 0) // Utilisateur fictif pour les messages envoyés à tout le monde
            ->where('deleted_by', null)
            ->get();
    
        // Renvoyer la vue avec les messages reçus, envoyés et envoyés à tout le monde
        return view('messages.index', compact('receivedMessages', 'sentMessages', 'sentToAllMessages'));
    }
    


    public function create()
    {
        // Renvoyer la vue pour créer un nouveau message
        return view('messages.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'message' => 'required|string',
        ]);
    
        // Créer un nouveau message
        $message = new Message();
        $message->id_user_send = auth()->user()->id;
        
        if ($request->has('send_to_all')) {
            // Si la case "Envoyer à tout le monde" est cochée
            $message->id_user_receive = 0; // Utilisateur fictif pour les messages envoyés à tout le monde
        } else {
            // Si un destinataire est spécifié, rechercher l'utilisateur destinataire par son nom
            $receiver = User::where('name', $request->input('receiver_name'))->first();
    
            // Vérifier si l'utilisateur destinataire existe
            if (!$receiver) {
                return back()->withErrors(['receiver_name' => 'Le destinataire n\'existe pas.'])->withInput();
            }
    
            $message->id_user_receive = $receiver->id;
        }
        
        $message->message = $validatedData['message'];
        $message->save();
    
        // Rediriger vers la liste des messages reçus ou faire une autre action appropriée
        return redirect()->route('messages.index');
    }  
    
    public function edit($id)
    {
        $message = Message::findOrFail($id);

        // Vérifier si l'utilisateur actuel est l'expéditeur du message
        if ($message->id_user_send === auth()->user()->id) {
            return view('messages.edit', compact('message'));
        } else {
            return redirect()->route('messages.index')->with('error', 'Vous ne pouvez pas éditer ce message.');
        }
    }

    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);

        // Vérifier si l'utilisateur actuel est l'expéditeur du message
        if ($message->id_user_send === auth()->user()->id) {
            $message->message = $request->input('message');
            $message->save();

            return redirect()->route('messages.index')->with('success', 'Message mis à jour avec succès.');
        } else {
            return redirect()->route('messages.index')->with('error', 'Vous ne pouvez pas éditer ce message.');
        }
    }

    public function deleteMessage($id)
    {
        $message = Message::findOrFail($id);

        // Vérifier si l'utilisateur connecté est l'expéditeur ou le destinataire du message
       
            // Supprimer le message pour l'utilisateur connecté en enregistrant son ID dans la colonne deleted_by
            $message->deleted_by = auth()->user()->id;
            $message->save();
            return redirect()->back()->with('success', 'Message supprimé avec succès.');
      
    }

    public function deleteMessageForAll($id)
    {
        $message = Message::findOrFail($id);

            // Supprimer le message pour tout le monde en enregistrant l'ID de l'utilisateur spécial dans la colonne deleted_by
            $message->delete();
            return redirect()->back()->with('success', 'Message supprimé pour tout le monde.');
      
    }

}