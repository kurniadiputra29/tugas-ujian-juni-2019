<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\User;

class ResetMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($resetpass)
    {
        $this->resetpass = $resetpass;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $users = User::where('email', $this->resetpass)->get();
        return $this->view('layouts.resetpass.sendmail', compact('users'));
    }
}
