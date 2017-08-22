<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Conner\Tagging\Taggable;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Models\Category;
use App\Models\Admin;
use Auth;
class Project extends Model
{
    use Taggable, SoftDeletes, Translatable;

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
        'slide_images',
        'categories',
        'excerpt',
        'meta_description',
        'meta_keyword',
        'seo_title',
        'status',
        'is_featured',
        'client',
        'due_date',
        'budget',
        'duration',

    ];

    protected $table = "projects";

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'slide_images' => 'array',
    // ];

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
     * Relationship with categories
     *
    */
    public function categories(){
        return $this->belongsToMany(Category::class, 'project_categories', 'project_id', 'category_id');
    }

    /**
     * Relationship with categories
     *
    */
    public function categoriesList(){
        return Category::where('model_type', 'PROJECT')->orderBy('created_at','desc')->get();
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
