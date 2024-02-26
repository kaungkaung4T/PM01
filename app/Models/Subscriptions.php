<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer',
        'code',
        'amount',
        'package',
        'start_at',
        'end_at',
        'status'
    ];

    public function customer_data ()  {
        // return $this->hasMany('App\Models\User', 'id', 'customer');       // For Many
        return $this->hasOne('App\Models\Customer', 'id', 'customer');
    }

    public function package_data ()  {
        // return $this->hasMany('App\Models\User', 'id', 'customer');       // For Many
        return $this->hasOne('App\Models\Package', 'id', 'package');
    }
}