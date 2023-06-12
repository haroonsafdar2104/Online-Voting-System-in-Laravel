<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\form_mail;
use App\Models\File;
class mailController extends Controller
{
    public function open_form()
    {
    return view('Mails/Mail_form');
    }
    public function send_mail(Request $req){
        $emails = [
        'email' => $req->get('email'),
        'cc' => $req->get('cc'),
        'bcc' => $req->get('bcc')
        ];
        $details = [
        'subject' => $req->get('subject'),
        'body' => $req->get('details'),
        // 'file'=> $req->file('file')
        ];
        if($emails["cc"] == '' && $emails["bcc"] == ''){
        Mail::to($emails['email'])->send(new form_mail($details));
        return redirect('mail_form')->with('status', "Email Sent Successfully!");
        }
        elseif($emails["bcc"] == ''){
        Mail::to($emails['email'])->cc($emails['cc'])->send(new
        form_mail($details));
        return redirect('mail_form')->with('status', "Email Sent 
        Successfully!");
        }
        else{
        Mail::to($emails['email'])->cc($emails['cc'])->bcc($emails['bcc'])->send(new form_mail($details));
        return redirect('mail_form')->with('status', "Email Sent Successfully!");
        }
        }
}
