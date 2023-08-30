<?php

namespace App\Http\Controllers;

use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;

class TestSendMailController extends Controller
{
    public function sendEmail()
    {
        $recipient = 'duong.lemanh@vti.com.vn';
        $recipient2 = 'DUONGLM.B19CN151@stu.ptit.edu.vn';

        Mail::to([$recipient, $recipient2])->send(new MyTestMail());

        return 'Email sent successfully';
    }
}
