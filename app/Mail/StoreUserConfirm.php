<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class StoreUserConfirm extends Mailable
{
    use Queueable, SerializesModels;


    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user_confirm')
                    ->subject("[Campbug] ユーザー登録認証メール")
                    ->from("noreply@campbug.net [Campbug運営]")
                    ->with([
                        "user" => $this->user,
                    ]);
    }
}
