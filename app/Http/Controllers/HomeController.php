<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Mail;
use PDF;

use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function email($id)
    {
        $dataa = User::find($id);
        $data["email"] = $dataa["email"];
        $data["title"] = "Peringatan Tenggat Bayar";
        $data["body"] = "This is Demo";
        $angsuran = Angsuran::where('user_id', $id);
        $pdf = PDF::loadView('angsuran.email', $data);
  
        Mail::send('email.peringatan', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "Surat Peringatan.pdf");
        });
        Toastr::success('Peringatan Berhsil Dikirim', 'SUKSES', ['options']);
        return redirect()->back();
    }
}