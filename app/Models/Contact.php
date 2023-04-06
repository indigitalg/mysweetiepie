<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    public $table = 'contacts';
 
	public $fillable = ['name','email','message','subject','phone','ipaddress'];
}
