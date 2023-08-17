<?php

namespace App\Http\Controllers;

use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;

class TestSendMailController extends Controller
{
    public function sendEmail()
    {
        $recipient = 'duong.lemanh@vti.com.vn';
        Mail::to($recipient)->send(new MyTestMail());

        return 'Email sent successfully';
    }
}
