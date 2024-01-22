<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'parent_category',
        'category_image',
        'category_name',
        'category_slug',
        'ordering',
        'type',
        'created_by',
        'updated_by',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'category_slug' => [
                'source' => 'category_name'
            ]
        ];
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category', 'id');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_category', 'id');
    }

    public function resources()
    {
        return $this->hasMany(Resources::class, 'resource_category_id', 'id')->orWhere('resource_subcategory_id','=', 'id');
    }
}
