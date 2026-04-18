<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'whmcs_product_id',
        'name',
        'description',
        'price',
        'billing_cycle',
        'category_id',
        'is_active',
        'order',
        'features',
        'badge_text',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function userServices()
    {
        return $this->hasMany(UserService::class);
    }
}
