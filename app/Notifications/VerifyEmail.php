<?php
    
    namespace App\Notifications;
    
    use Carbon\Carbon;
    use Illuminate\Support\Facades\URL;
    use Illuminate\Auth\Notifications\VerifyEmail as Notification;
    
    class VerifyEmail extends Notification
    {
        /**
         * Get the verification URL for the given notifiable.
         *
         * @param  mixed  $notifiable
         * @return string
         */
        protected function verificationUrl($notifiable)
        {
            return URL::temporarySignedRoute(
                'verification.verify', Carbon::now()->addMinutes(60), [
                    'id' => $notifiable->id,
                    'hash' => sha1($notifiable->email)
                ]
            );
        }
    }
