<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignScheduleReservation extends Model
{
    use HasFactory;

    protected $fillable=[
        'schedule_id',
        'reservation_id',
    ];

    public function schedule()
    {
        return $this->belongsTo(ScheduleEvent::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

}
