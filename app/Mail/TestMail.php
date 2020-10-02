<?php

namespace App\Mail;

use App\Anonymous;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        function hideEmail($email)
        {
            $em   = explode("@", $email);
            $name = implode("@", array_slice($em, 0, count($em) - 1));
            $len  = floor(strlen($name) / 2);
            return substr($name, 0, $len) . str_repeat('*', $len) . "@" . end($em);
        }

        $info = Anonymous::orderBy('updated_at', 'desc')->limit(1)->get();
        $email =  env('MAIL_USERNAME', 'anonymous@anonymous.com');

        foreach ($info as $inf) {
            return $this->from(hideEmail($email), 'Anonymous')
                ->subject('Anonymous Information')
                ->markdown('mails.testmail')
                ->with([
                    'name' => 'Bernard',
                    'message' => $inf->message,
                    'link' => 'https://mailtrap.io/inboxes'
                ]);
        }
    }
}
