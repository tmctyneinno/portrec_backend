<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobApplicationStatusUpdateNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $job_title;
    protected $name;
    protected $status;
    protected $company;

    /**
     * Create a new notification instance.
     */
    public function __construct($mailObj)
    {
        $this->name = $mailObj['name'];
        $this->job_title = $mailObj['job_title'];
        $this->status = $mailObj['status'];
        $this->company = $mailObj['company'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(): MailMessage
    {

        $statusMessages = [
            'Interviewing' => 'Invitation for interview',
            'Shortlisted' => 'You have been Shortlisted',
            'Rejected' => 'Your application was rejected.',
            'Offered' => 'You have been offered This Job',
            'In-Review' => 'Aplication In review',
        ];


        return (new MailMessage)
            ->greeting("Dear {$this->name},")
            ->subject('Update on Job Application TEST')
            ->line("Update on Job Application (**{$this->job_title}** at **{$this->company}**")
            ->line("{$statusMessages[$this->status]}");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
