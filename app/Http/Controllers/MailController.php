<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_mail()
    {
        $to_name = "Why Tech Ecommerce";
        $to_email = "nguondiengao@gmail.com";//send to this email

        $data = array("name"=>"Mail từ khách hàng","body"=>"Mail gửi về vấn đề hàng hóa"); //body of mail.blade.php
    
        Mail::send('emails.send_mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Test Send Google Mail'); //send this mail with subject
            $message->from($to_email,$to_name); //send from this mail
        });

        return redirect('/');
    }
}
