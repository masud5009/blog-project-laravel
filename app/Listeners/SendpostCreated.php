<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Mail\PostMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendpostCreated
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
     * @param  object  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $users = User::all();
        foreach($users as $user){
            Mail::to($user->email)->send(new PostMail($event->post));
        }
    }
}
