<?php

namespace App\Http\Eloquent;

use App\contact_us;
use App\Http\interfaces\adminRepositoryInterface;

class adminRepository implements adminRepositoryInterface
{
    public function getAllMessages()
    {
        $messages = contact_us::get()->all();
        return $messages;
    }

    //delete message
    public function deleteMessage($id)
    {
        return contact_us::where('id', $id)->delete();
    }

}
