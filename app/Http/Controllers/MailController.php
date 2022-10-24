<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'mail from maine',
            'body' => 'test sent mail using smtp',
        ];
        Mail::to('emma28072002@gmail.com')->send(new SendEmail($mailData));

        dd('email is sent to emma28072002@gmail.com');
    }
}
