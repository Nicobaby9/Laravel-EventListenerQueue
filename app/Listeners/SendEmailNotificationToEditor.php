<?php

namespace App\Listeners;

use App\Events\CreatedArticleForEditor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CreatedArticleMailForEditor;
use Mail;

class SendEmailNotificationToEditor implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreatedArticle  $event
     * @return void
     */
    public function handle(CreatedArticleForEditor $event)
    {
        Mail::to('nosvengeance@gmail.com')->send(new CreatedArticleMailForEditor($event->article, $event->user));
    }
}
