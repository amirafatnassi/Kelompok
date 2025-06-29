<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'AppointmentNumber',
        'patient_id',
        'AppointmentDate',
        'AppointmentTime',
        'Specialization',
        'Doctor',
        'Message',
        'Remark',
        'Status',
    ];
}
