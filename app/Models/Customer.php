<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'name', 'email','active'
    ];


    public function getActiveAttribute($value)
    {
        if ($value == 1) {
            return  "Active";
        }else{
            return "Inactive";
        }
    
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }
}


