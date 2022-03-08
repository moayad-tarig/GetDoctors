<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accepted extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'accept_id',
        'name',
        'phone_number',
      
        'area',
        'note',
    ];




    public function users(){
        return $this->belongsTo(User::class);
    }
}
    