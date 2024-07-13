<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function contact(Request $request){
        $subject = "Contactanos";
        $for = "community@phonebol.com"; 
        Mail::send('contacto.index',$request->all(), function($msj) use($subject,$for){
            $msj->from("prueba1@gmail.com","PhonebolWebSite");
            $msj->subject($subject);
            $msj->to($for);
        });
        return redirect()->back();
    }
}
