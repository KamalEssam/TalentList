<?php

namespace App\Http\Controllers;

use App\Http\Eloquent\contactUsRepository;
use RealRashid\SweetAlert\Facades\Alert;
use App\contact_us;
use App\Http\Traits\FilesTrait;
use App\Mail\contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    protected $contactUsRepo;

    public function __construct(contactUsRepository $contactUsRepo)
    {
        $this->contactUsRepo = $contactUsRepo;
    }

    // get home page for contact us
    public function getContactUs()
    {
        return view('index');
    }

    //send email contact us
    public function sendEmail(Request $request)
    {
        $this->contactUsRepo->createMessage($request);
        // sweet alert
        Alert::success('Success', 'Message Send Successfully ');
        return redirect()->back()->with(['success', 'your message send successfully']);
    }


}
