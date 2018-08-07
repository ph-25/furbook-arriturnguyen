<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    //Code theo trang 30, bo dong timestamps
    public function cats(){
    	return $this->hasMany('Furbook\Cat');
    }
}


