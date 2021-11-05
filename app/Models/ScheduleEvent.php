<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleEvent extends Model
{
    use HasFactory;

    protected $fillable=[
        'team',
        'location',
        'status', //if ongoing or outgoing
    ];

    public function assign_schedule_reservation()
    {
        return $this->hasMany(AssignScheduleReservation::class);
    }
}
