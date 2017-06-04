<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionaire extends Model
{
   protected $table = 'questionaires_tbl';

    public function user()
   {
   	return $this->belongsTo('App\User','user_id_fk','id');
   }
    public function questionn()
   {
   	return $this->hasMany('App\Questions','questionair_id_fk');
   }
}
