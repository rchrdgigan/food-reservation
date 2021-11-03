<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignFoodPackage extends Model
{
    use HasFactory;

    protected $fillable=[
        'food_package_id',
        'food_id',
    ];

    public function food()
    {
        return $this->hasMany(Food::class);
    }

    public function food_package()
    {
        return $this->hasMany(FoodPackage::class);
    }
    
}
