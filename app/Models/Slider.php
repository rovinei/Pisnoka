<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Slider extends Model
{
    use Translatable;

    /**
     * use with softdeleted, when record deleted this attribute is set to
     * date that it have been deleted
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'image',
        'description',
        'slogan',
        'is_featured',
    ];

    protected $table = "sliders";

    // /**
    //  * Mutator for feature image attribute
    //  * remove domain from asset url
    // */
    public function setImageAttribute($value){
        $img_path = str_replace(URL('/'), '', $value);
        $this->attributes['image'] = $img_path;
    }
}
