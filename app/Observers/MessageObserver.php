<?php

namespace App\Observers;

use App\Models\Message;

class MessageObserver
{
    public function retrieved(Message $message)
    {
        // Marquer le message comme lu s'il est récupéré en tant que message reçu (id_user_receive)
        if ($message->id_user_receive === auth()->user()->id) {
            $message->statut_message = 'lu';
            $message->save();
        }
    }
    /**
     * Handle the Message "created" event.
     */
    public function created(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "updated" event.
     */
    public function updated(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "deleted" event.
     */
    public function deleted(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "restored" event.
     */
    public function restored(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "force deleted" event.
     */
    public function forceDeleted(Message $message): void
    {
        //
    }
}
