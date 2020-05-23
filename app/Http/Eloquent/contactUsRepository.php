<?php

namespace App\Http\Eloquent;

use App\contact_us;
use App\Http\interfaces\contactUsRepositoryInterface;
use App\Mail\contactus;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class contactUsRepository implements contactUsRepositoryInterface
{
    public function createMessage( $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if ($validation->fails()) {
            // sweet alert
            Alert::error('Failed', 'Failed Send Message');
            return redirect()->back()->withErrors($validation->errors());
        }

        $message= contact_us::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'subject' => $request['subject'],
            'message' => $request['message']
        ]);

        Mail::to('kamalessam1997@hotmail.com')->send(new contactus($request));
        return $message;
    }



}
