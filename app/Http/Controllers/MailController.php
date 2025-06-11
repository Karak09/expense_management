<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExpensesMail;

class MailController extends Controller
{
    function sendmail(){
        // return "email send succesfully";
        $to="sumankarak50@gmail.com";
        $msg="checking";
        $subject="hello";
       Mail::to($to)->send(new ExpensesMail($msg,$subject));

    }
}
