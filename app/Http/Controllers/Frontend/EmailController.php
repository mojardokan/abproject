<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Mail;

class EmailController extends Controller
{
    public function getContact(){
      return view ('frontend.pages.contactform');
    }

    public function postContact(Request $request)
    {
      $inputs = [
        'name' => $request->input('username'),
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message')
      ];

      Mali::send('frontend.pages.contactmail', $inputs, function($mail) use($inputs){
        $mail->from($inputs['email'], $inputs['username'])
            ->to('aminbazar.onlineshop@gmail.com', 'Amin')
            ->subject("AminBazar");
      });
      session()->flash('success', 'Your order has taken successfully !!! Please wait admin will soon confirm it.');

      return redirect()->back();
    }
}
