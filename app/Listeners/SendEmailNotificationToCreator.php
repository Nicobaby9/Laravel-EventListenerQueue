<?php

namespace App\Listeners;

use App\Events\CreatedArticle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CreatedArticleMail;
use Mail;

class SendEmailNotificationToCreator implements ShouldQueue
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
    public function handle(CreatedArticle $event)
    {
        Mail::to($event->user)->send(new CreatedArticleMail($event->article, $event->user));
    }
}
