<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'motif',
        'venue',
        'guests_no',
        'r_date',
        'r_type',
        'special_req',
        'total_payment',
        'downpayment',
        'gcash_name',
        'upload_image',
        'dp_date_time',
        'status',
    ];
    public function reservation_package()
    {
        return $this->hasMany(ReservationPackage::class);
    }

}
