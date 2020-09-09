<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Article\Article;
use App\Models\User;

class CreatedArticleMailForEditor extends Mailable
{
    use Queueable, SerializesModels;

    protected $articlem, $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Article $article, User $user)
    {
        $this->article = $article;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')
                    ->view('created_article_mail_for_editor')
                    ->with([
                            'title' => $this->article->title,
                            'body' => $this->article->body,
                            'name' => $this->user->name,
                            'status' => $this->article->publish_status
                        ]);
    }
}
