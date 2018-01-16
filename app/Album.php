<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    // writable field
    protected $fillable = ['name', 'intro', 'cover'];

    // One for many: a album include many photos
    public function photos()
    {
    	return $this->hasMany('App\Photo');
    }
}
