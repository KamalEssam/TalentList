<?php

namespace App\Http\interfaces;

interface adminRepositoryInterface
{
    //get all messages
 public function getAllMessages();
 //delete msg
 public function deleteMessage($id);

}
