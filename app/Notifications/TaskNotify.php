<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskNotify extends Notification implements ShouldQueue
{
    use Queueable;

    private $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Your Task '.$this->task->name.' has been completed!')
                    ->action('Task Detail', url('/show/'.$this->task->uuid))
                    ->line('Thank you!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
