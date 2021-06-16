<?php
    
    namespace App\Notifications;
    
    use Illuminate\Notifications\Messages\MailMessage;
    use Illuminate\Auth\Notifications\ResetPassword as Notification;
    
    class ResetPassword extends Notification
    {
        /**
         * Build the mail representation of the notification.
         *
         * @param  mixed  $notifiable
         * @return string
         */
        public function toMail($notifiable)
        {
            return (new MailMessage)
                    ->view('emails.reset')
                    ->action('token', $this->token)
                    ->greeting(urlencode($notifiable->email))
                    ->subject('Сброс пароля на сайте ' . config('app.name'));
        }
    }
