<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LockAccountNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $Fullname, $TenTK;

    /**
     * Create a new message instance.
     */
    public function __construct($Fullname,$TenTK)
    {
        $this->Fullname = $Fullname;
        $this->TenTK = $TenTK;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.layout.emails.lock_account_notification')
                    ->with([
                            'Fullname' => $this->Fullname,     
                            'TenTK' => $this->TenTK,     
                    ])
                    ->subject('Thông báo về việc tài khoản bị khóa.');
    }
}
