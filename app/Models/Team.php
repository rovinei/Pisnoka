<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Team extends Model
{

    public function setAvatarPictureAttribute($value){
        $img_path = str_replace(URL('/'), '', $value);
        $this->attributes['avatar_picture'] = $img_path;
    }
}
