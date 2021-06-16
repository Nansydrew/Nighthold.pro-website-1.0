<?php

    namespace App\Models;

    use App\Events\ThreadReceivedNewReply;
    use App\Models\Channel;
    use App\Models\Filters\Forum\ThreadFilters;
    use App\Models\RecordsActivity;
    use App\Models\Reply;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Str;

    class Thread extends Model
    {
        use RecordsActivity;

        protected $guarded = [];

        protected $with = ['creator', 'channel', 'thread'];

        protected $appends = ['isSubscribedTo'];
        protected $dates = ['expired_at'];

        protected $casts = [
                'locked' => 'boolean'
        ];

        public function path(): string
        {
            return route('topic.show', [$this->id]);
        }

        public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(User::class, 'user_id');
        }

        public function channel(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(Channel::class);
        }

        public function channels(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(Channel::class, 'channel_id', 'id');
        }

        public function replies(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return $this->hasMany(Reply::class);
        }

        public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function parentId(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(self::class);
        }

        public function thread(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(self::class, 'parent_id', 'id');
        }

        public function channelId(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(Channel::class, 'id', 'channel_id');
        }

        public function userId(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(User::class, 'id', 'user_id');
        }

        public function addReply($reply)
        {
            $reply = $this->create($reply);

            event(new ThreadReceivedNewReply($reply));

            return $reply;
        }

        public function scopeFilter($query, ThreadFilters $filters): \Illuminate\Database\Eloquent\Builder
        {
            return $filters->apply($query);
        }

        public function subscribe($userId = null): Thread
        {
            $this->subscriptions()->create([
                    'user_id' => $userId ?: auth()->id()
            ]);
            return $this;
        }

        public function unsubscribe($userId = null)
        {
            $this->subscriptions()
                    ->where('user_id', $userId ?: auth()->id())
                    ->delete();
        }

        public function subscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return $this->hasMany(ThreadSubscription::class);
        }

        public function getIsSubscribedToAttribute(): bool
        {
            return $this->subscriptions()
                    ->where('user_id', auth()->id())
                    ->exists();
        }

        public function hasUpdatesFor($user): bool
        {
            $key = $user->visitedThreadCacheKey($this);
            return $this->updated_at > cache($key);
        }

        public function getRouteKeyName(): string
        {
            return 'id';
        }

        public function setSlugAttribute($value)
        {
            if (static::whereSlug($slug = Str::slug($value))->exists()) {
                $slug = "{$slug}-{$this->id}";
            }
            $this->attributes['slug'] = $slug;
        }

        public function markBestReply(Reply $reply)
        {
            $this->update(['best_reply_id' => $reply->id]);
        }

        public function toSearchableArray(): array
        {
            return $this->toArray() + ['path' => $this->path()];
        }

    }
