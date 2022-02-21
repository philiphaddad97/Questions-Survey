<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $view, $data, $title;

    /**
     * Create a new message instance.
     *
     * @param        $view
     * @param array $data
     * @param string $title
     */
    public function __construct($view, $data = [], $title = "Title")
    {
        $this->view  = $view;
        $this->data  = $data;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('layouts.'.$this->view)->subject($this->title);
    }
}
