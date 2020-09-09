<?php

namespace App\Listeners;

use App\Events\UpdatedArticle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\UpdatedArticleMail;
use Mail;

class SendEmailNotificationUpdateToEditor implements ShouldQueue
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
     * @param  UpdatedArticle  $event
     * @return void
     */
    public function handle(UpdatedArticle $event)
    {
        Mail::to($event->user)->send(new UpdatedArticleMail($event->article, $event->user));
    }
}
