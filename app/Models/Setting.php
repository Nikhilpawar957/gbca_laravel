<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'favicon',
    ];

    public function getLogoAttribute($value)
    {
        return asset('admin/dist/img/logo-favicon/'.$value);
    }

    public function getFaviconAttribute($value)
    {
        return asset('admin/dist/img/logo-favicon/'.$value);
    }
}
