<?php

namespace App\Mail;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
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
        // $info = Contact::get();
        $info = Contact::orderBy('updated_at','desc')->limit(1)->get();
        // dd($info);

        foreach($info as $inf){
            // dd($inf->message);
            $link = 'https://mailtrap.io/inboxes';
                return $this->from($inf->email, $inf->name)
                    ->subject('Secret Information')
                    ->markdown('mails.email')
                    ->with([
                        'name' => $inf->name,
                        'message' => $inf->message,
                        'link' => $link
                    ]);
        }


    }
}
