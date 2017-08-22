<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use App\Models\Admin;
use Auth;

class Milestone extends Model
{

    use Translatable;
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
}
