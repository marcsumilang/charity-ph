<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRecord extends Model
{
    //
	protected $fillable = ["id","table_type","table_id","payment_method_id","status_option_id","total","other","created_at","updated_at"];


	public function paymentMethod() {
	    return $this->belongsTo('App\PaymentMethod');
	}


	public function statusOption() {
	    return $this->belongsTo('App\StatusOption');
	}

	public function table(){

		return $this->morphTo('table');
	}
}
