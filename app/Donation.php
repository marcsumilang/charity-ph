<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    //

	protected $fillable = ["id","first_name","last_name","email_address","created_at","updated_at"];


	public function hasOnePaymentRecord()
	{
		return $this->morphOne('App\PaymentRecord', 'table');
	}
}
