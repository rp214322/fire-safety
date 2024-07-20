<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function gallery(){
        return $this->hasMany('App\Models\ProductGallery');
    }

    public function feature_image(){
        return $this->hasOne('App\Models\ProductGallery')->where('is_featured',true);
    }
}
