<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable=[
        'food_title',
        'description',
        'price',
        'categories',
        'image',
    ];

    public function assign_food_package()
    {
        return $this->hasMany(AssignFoodPackage::class);
    }

    public function food_package()
    {
        return $this->belongsTo(FoodPackage::class);
    }
}
