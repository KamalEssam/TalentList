<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_us extends Model
{
    protected $fillable=['name','email','subject','message'];

}
