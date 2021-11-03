<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodPackage extends Model
{
    use HasFactory;

    protected $fillable=[
        'package_name',
        'price',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function assign_food_package()
    {
        return $this->hasMany(AssignFoodPackage::class);
    }
    
}
