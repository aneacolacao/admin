<?php

namespace App\Listeners;

use Mail;
use App\Events\UserCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail implements ShouldQueue
{

	use InteractsWithQueue;
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        // dd($event);

        

       $user = $event->user;

        $data = array('name'=>$user['name'], 'email'=>$user['email'], 'password'=>$user['password'],);

        Mail::send('emails.newUser', $data, function($message) use ($user) {

            $message->from('hello@app.com', 'Your App!');

            $message->to($user['email'], $user['name']);

            $message->subject('New User Registered');

        });

    
    }
}
