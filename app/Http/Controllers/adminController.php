<?php

namespace App\Http\Controllers;

use App\contact_us;
use App\Http\interfaces\adminRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class adminController extends Controller
{
    protected $adminRepo;

    public function __construct(adminRepositoryInterface $adminRepo)
    {
        $this->adminRepo = $adminRepo;
    }

    public function adminHome()
    {
        $messages = $this->adminRepo->getAllMessages();
        return view('layouts.starter', compact('messages'));
    }

    public function delete(Request $request, $id)
    {
        $this->adminRepo->deleteMessage($id);
        alert()->success('Successfully Deleted!', 'Message Deleted Successfully!')->persistent(true, false);
        return redirect()->back()->with('success', 'Record has been deleted');
    }


}
