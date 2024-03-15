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
        'status',
        'reward_wallet_1',
        'reward_wallet_2',
        'reward_wallet_3',
        'wallet',
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
