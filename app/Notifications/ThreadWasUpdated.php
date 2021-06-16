<?php
    
    namespace App\Notifications;
    
    use App\Modules\Forum\Thread\Models\Thread;
    use App\Modules\Forum\Topic\Models\Reply;
    use Illuminate\Notifications\Notification;

    class ThreadWasUpdated extends Notification {
        /**
         * The thread that was updated.
         *
         * @var Thread
         */
        protected $thread;
    
        /**
         * The new reply.
         *
         * @var Reply
         */
        protected $reply;
    
        /**
         * Create a new notification instance.
         *
         * @param Thread $thread
         * @param Reply  $reply
         */
        public function __construct($thread, $reply)
        {
            $this->thread = $thread;
            $this->reply = $reply;
        }
    
        /**
         * Get the notification's delivery channels.
         *
         * @return array
         */
        public function via()
        {
            return ['database'];
        }
    
        /**
         * Get the array representation of the notification.
         *
         * @return array
         */
        public function toArray()
        {
            return [
                    'message' => $this->reply->owner->name . ' replied to ' . $this->thread->title,
                    'link' => $this->reply->path()
            ];
        }
    }