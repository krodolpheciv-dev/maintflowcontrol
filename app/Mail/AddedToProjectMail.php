<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddedToProjectMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $user;
    public $projects; // collection des projets avec pivot role_id
    public $globalRole; // rôle global Spatie

    public function __construct($user, $projects, $globalRole)
    {
        //

        $this->user = $user;
        $this->projects = $projects;
        $this->globalRole = $globalRole;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Vous avez été ajouté à de nouveaux projets')
                    ->view('emails.addedtoprojectmail')
                    ->with([
                        'user' => $this->user,
                        'projects' => $this->projects,
                        'globalRole' => $this->globalRole
                    ]);
    }
}
