<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationPackage extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'reservation_id',
        'food_package_id',
        'package_name',
        'price',
        'foods',
    ];

    protected $casts =[
        'foods' => 'array',
    ];
    
}
