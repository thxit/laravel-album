<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    // writable field
    protected $fillable = ['name', 'intro', 'cover'];
}
