<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UnLockAccountNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $Fullname, $newpass, $TenTK;

    /**
     * Create a new message instance.
     */
    public function __construct($Fullname,$newpass, $TenTK)
    {
        $this->Fullname = $Fullname;
        $this->newpass = $newpass;
        $this->TenTK = $TenTK;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.layout.emails.un_lock_account_notification')
            ->with([
                'Fullname' => $this->Fullname,
                'NewPass' => $this->newpass,
                'TenTK' => $this->TenTK,
            ])
            ->subject('Thông báo về việc tài khoản đã được khôi phục.');
    }
}
