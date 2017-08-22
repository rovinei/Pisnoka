<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Partner extends Model
{
    public function setCompanyLogoAttribute($value){
        $img_path = str_replace(URL('/'), '', $value);
        $this->attributes['company_logo'] = $img_path;
    }
}
