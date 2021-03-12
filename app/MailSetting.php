<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailSetting extends Model
{
    //
	protected $fillable = ["id","mail_option_id","to","from","from_sender","cc","created_at","updated_at"];


	public function mailOption() {
	    return $this->belongsTo('App\MailOption');
	}
}
