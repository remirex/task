<?php

namespace App\Notifications;

use App\Http\Requests\JobRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Request;

class ModeratorNotification extends Notification
{
    use Queueable;

    private $jobId;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(JobRequest $jobRequest, $jobId)
    {
        $this->message = $jobRequest;
        $this->jobId = $jobId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $link = url('/publish', $this->jobId);

        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->line('Title: '. $this->message->get('title'))
                    ->line('Description: '. $this->message->get('description'))
                    ->action('Publish Job', $link)
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
