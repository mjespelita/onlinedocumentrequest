<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'documentid',
        'departmentlevelid',
        'phonenumber',
        'schoolyeargraduated',
        'remarks'
    ];
}
