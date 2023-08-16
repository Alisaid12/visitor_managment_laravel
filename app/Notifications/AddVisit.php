<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddVisit extends Notification
{
    use Queueable;

    private $visiteur_id;
    private $user_create;
    private $visiteur;
    public function __construct($visiteur_id,$user_create, $visiteur)
    {
        $this->visiteur_id = $visiteur_id ; 
        $this->user_create = $user_create ; 
        $this->visiteur = $visiteur ; 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

 
    public function toArray(object $notifiable): array
    {
        return [
            'visiteur_id' => $this->visiteur_id,
            'user_create' => $this->user_create,
            'visiteur' => $this->visiteur  
        ];
    }
}
