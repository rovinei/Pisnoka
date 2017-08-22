<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Models\Category;
use App\Models\Admin;
use Auth;

class Service extends Model
{
    use Translatable, SoftDeletes;

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
        'slug',
        'content',
        'featured_image',
        'excerpt',
        'meta_description',
        'meta_keyword',
        'seo_title',
        'is_featured',
        'category_id'

    ];

    protected $table = "services";

    /**
     * Override save method
     *
    */
    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->created_by && Auth::user()) {
            $this->created_by = Auth::user()->id;
        }

        parent::save();
    }

    /**
     * Relationship with author
     *
    */
    public function createdBy(){
        return $this->belongsTo(Admin::class);
    }

    /**
     * Relationship with author
     *
    */
    public function updatedBy(){
        return $this->belongsTo(Admin::class);
    }

    /**
     * Relationship with category
     *
    */
    public function categoryId(){
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship with category
     *
    */
    public function categoryIdList(){
        return Category::where('model_type', 'SERVICE')
                        ->orderBy('created_at', 'desc')
                        ->get();
    }


    /**
     * Mutator for feature image attribute
     * remove domain from asset url
    */
    public function setFeaturedImageAttribute($value){
        $img_path = str_replace(URL('/'), '', $value);
        $this->attributes['featured_image'] = $img_path;
    }


    /**
     * Mutator for updated_by attribute
     * Set mutator to current authenticated user
    */
    public function setUpdatedByAttribute($value){
        if(Auth::check()){
            $this->attributes['updated_by'] = Auth::user()->id;
        }else{
            throw new Exception("You don't have permission to perform this action.", 1);
        }

    }
}
