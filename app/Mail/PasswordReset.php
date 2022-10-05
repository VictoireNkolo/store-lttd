<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    public $passwordResetDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $passwordResetDetails)
    {
        $this->passwordResetDetails = $passwordResetDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('myconfig.password_reset.mailfrom'))
            ->view('emails.password_reset');
    }
}
