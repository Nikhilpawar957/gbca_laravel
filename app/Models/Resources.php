<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resources extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $fillable = [
        'resource_category_id',
        'resource_subcategory_id',
        'resource_title',
        'resource_slug',
        'resource_short_desc',
        'resource_desc',
        'resource_file',
        'resource_image',
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
            'resource_slug' => [
                'source' => 'resource_title'
            ]
        ];
    }
}
