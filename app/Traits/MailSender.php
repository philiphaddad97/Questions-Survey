<?php

namespace App\Traits;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

trait MailSender
{
    public static function sendEmail($to, $view, $data, $title)
    {
        Mail::to($to)->send(new SendMail($view, $data, $title));
        return Mail::failures() ? 0 : 1;
    }

}
