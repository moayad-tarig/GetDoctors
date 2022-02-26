<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetDoctor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'area',
        'phone_number',
        'specialtie'
    ];
    
}
