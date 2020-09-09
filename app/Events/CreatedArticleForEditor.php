<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Article\Article;
use App\Models\User;

class CreatedArticleForEditor
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user, $article;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Article $article)
    {
       $this->article = $article;
       $this->user = $user;
    }
}
