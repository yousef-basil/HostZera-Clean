<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'order',
        'description',
        'hero_description',
        'icon_image',
        'features',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id')->orderBy('order');
    }
}
