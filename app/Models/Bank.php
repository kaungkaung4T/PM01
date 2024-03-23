<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'bank_name',
        'account_name',
        'account_number',
        'phone_number'
    ];

    public function customer_data ()  {
        // return $this->hasMany('App\Models\Customer', 'id', 'system_user');       // For Many
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }
}
