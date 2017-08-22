<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Recognition extends Model
{
    use Translatable;
    /**
     * Mutator for feature image attribute
     * remove domain from asset url
    */
    public function setImageAttribute($value){
        $img_path = str_replace(URL('/'), '', $value);
        $this->attributes['image'] = $img_path;
    }
}
