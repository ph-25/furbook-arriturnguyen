<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    //
    protected $fillable = [ // Bien $fillable cho phep dang ki cac cot duoc dien
    	'name',
    	'date_of_birth',
    	'breed_id',
    ];

    public function breed(){
    	return $this->belongsTo('Furbook\Breed');
    }	
}
