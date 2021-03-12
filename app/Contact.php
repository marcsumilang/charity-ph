<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //

	protected $fillable = ["id","name","email_address","message","created_at","updated_at"];
}
