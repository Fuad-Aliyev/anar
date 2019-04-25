<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    //
    protected $fillable = ['fk_user', 'date', 'content', 'email'];
}
